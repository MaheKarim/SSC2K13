<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
use App\Models\Donation;
use App\Services\SmsService;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with(['sentToPhone', 'jerseyDetail.size']);

        // Filters
        if ($request->filled('type')) {
            $query->where('donation_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('phone', 'like', "%{$request->search}%")
                    ->orWhere('transaction_id', 'like', "%{$request->search}%");
            });
        }

        $donations = $query->latest()->paginate(20);

        return view('admin.donations.index', compact('donations'));
    }

    public function show(Donation $donation)
    {
        $donation->load(['sentToPhone', 'jerseyDetail.size', 'paymentHistories.admin']);
        return view('admin.donations.show', compact('donation'));
    }

    /**
     * Record an additional payment for a donation
     */
    public function recordPayment(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01', 'max:' . $donation->due_amount],
            'payment_method' => ['required', 'in:cash,bkash,nagad,rocket,bank_transfer,other'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        // Add the payment
        $payment = $donation->addPayment(
            amount: $validated['amount'],
            paymentMethod: $validated['payment_method'],
            transactionId: $validated['transaction_id'] ?? null,
            notes: $validated['notes'] ?? null,
            collectedBy: auth('admin')->user()?->name ?? 'Admin',
            adminId: auth('admin')->id()
        );

        AdminActivity::log(
            'updated',
            'Donation',
            $donation->id,
            "Recorded payment of ৳{$validated['amount']} for registration #{$donation->id}",
            ['payment_id' => $payment->id, 'amount' => $validated['amount']]
        );

        $message = "Payment of ৳{$validated['amount']} recorded successfully.";
        if ($donation->fresh()->payment_status === 'paid_in_full') {
            $message .= " Registration is now fully paid.";
        } else {
            $remaining = $donation->fresh()->due_amount;
            $message .= " Remaining due: ৳{$remaining}";
        }

        return back()->with('success', $message);
    }

    public function verify(Donation $donation)
    {
        // Auto-set payment to full when verified (if not already partially/fully paid)
        $paymentUpdates = ['status' => 'verified'];
        if ($donation->payment_status !== 'partial_paid' && $donation->payment_status !== 'paid_in_full') {
            $paymentUpdates['paid_amount']    = $donation->amount;
            $paymentUpdates['due_amount']     = 0;
            $paymentUpdates['payment_status'] = 'paid_in_full';
        } elseif ($donation->payment_status === 'partial_paid') {
            // Keep partial — admin will manually record remaining
        }

        $donation->update($paymentUpdates);

        // Create payment history if becoming fully paid now
        if (!$donation->wasRecentlyCreated && isset($paymentUpdates['paid_amount'])) {
            $donation->paymentHistories()->create([
                'amount'         => $donation->amount,
                'payment_method' => 'other',
                'notes'          => 'Marked as paid on verification',
            ]);
        }

        AdminActivity::log(
            'verified',
            'Donation',
            $donation->id,
            "Verified registration #{$donation->id} by {$donation->name}"
        );
        $donation->load(['jerseyDetail.size', 'sentToPhone']);

        // Send SMS notification
        $smsService = new SmsService();
        $amount = $donation->amount + 0; // Removing any trailing decimal zeroes
        $sentToNumber = $donation->sentToPhone?->number ?? 'N/A';
        $message = "SSC-2013 Iftar Mehfil & NPL S9/'26 ইভেন্টে আপনার রেজিস্ট্রেশন ও {$amount}TK BDT পেমেন্ট Sent To: {$sentToNumber} সফল হয়েছে।";

        if ($donation->jerseyDetail) {
            $jerseySize = $donation->jerseyDetail->size->size ?? 'N/A';
            $nameOnJersey = $donation->jerseyDetail->name_on_jersey ?? 'N/A';
            $numberOnJersey = $donation->jerseyDetail->number_on_jersey ?? 'N/A';
            $message .= " আপনার Jersey Size: {$jerseySize} | Name: {$nameOnJersey} | Number: {$numberOnJersey}";
        }

        $message .= "\n– Developed By Mahe Karim";

        $result = $smsService->send($donation->phone, $message);

        $donation->update([
            'sms_sent' => $result['success'],
            'sms_response' => $result['response'],
        ]);

        $smsStatus = $result['success'] ? 'SMS sent successfully.' : 'Registration verified but SMS failed.';

        return back()->with('success', "Registration verified. {$smsStatus}");
    }

    public function markTransferred(Donation $donation)
    {
        $donation->update(['is_transferred' => true]);

        AdminActivity::log(
            'updated',
            'Donation',
            $donation->id,
            "Marked registration #{$donation->id} by {$donation->name} as transferred to committee"
        );

        return back()->with('success', 'Registration marked as transferred to committee successfully.');
    }

    public function export(Request $request)
    {
        $query = Donation::with(['sentToPhone', 'jerseyDetail.size']);

        // Apply same filters as index
        if ($request->filled('type')) {
            $query->where('donation_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $donations = $query->latest()->get();

        $filename = 'donations_' . date('Y-m-d_His') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // CSV Header
        fputcsv($output, [
            'ID',
            'Name',
            'Phone',
            'Donation Type',
            'Amount',
            'Sent From',
            'Sent To',
            'Transaction ID',
            'Status',
            'Jersey Size',
            'Name on Jersey',
            'Number on Jersey',
            'Created At'
        ]);

        // CSV Rows
        foreach ($donations as $donation) {
            fputcsv($output, [
                $donation->id,
                $donation->name,
                $donation->phone,
                $donation->donation_type_label,
                $donation->amount,
                $donation->sent_from,
                $donation->sentToPhone?->number ?? 'N/A',
                $donation->transaction_id,
                $donation->status,
                $donation->jerseyDetail?->size?->size ?? 'N/A',
                $donation->jerseyDetail?->name_on_jersey ?? 'N/A',
                $donation->jerseyDetail?->number_on_jersey ?? 'N/A',
                $donation->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        fclose($output);
        exit;
    }

    /**
     * Show manual entry form
     */
    public function createManual()
    {
        return view('admin.donations.create-manual');
    }

    /**
     * Store manual entry
     */
    public function storeManual(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'type' => ['required', 'in:participant,sponsor'],
            'donation_type' => ['required', 'in:iftar,jersey,both'],
            'amount' => ['required', 'numeric', 'min:0'],
            'paid_amount' => ['nullable', 'numeric', 'min:0'],
            'payment_type' => ['required', 'in:full_upfront,partial_upfront'],
            'collect_by' => ['required', 'string', 'max:255'],
            'sent_from' => ['nullable', 'string', 'max:20'],
            'sent_to_phone_id' => ['nullable', 'exists:phone_numbers,id'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:pending,verified'],
            'notes' => ['nullable', 'string'],
        ]);

        // Calculate paid amount and payment status
        $totalAmount = $validated['amount'];
        $isPartial = $validated['payment_type'] === 'partial_upfront';
        $paidAmount = $isPartial ? (float) ($validated['paid_amount'] ?? 0) : $totalAmount;
        $dueAmount = $totalAmount - $paidAmount;

        // Ensure paid amount doesn't exceed total
        if ($paidAmount > $totalAmount) {
            $paidAmount = $totalAmount;
            $dueAmount = 0;
        }

        $paymentStatus = $paidAmount >= $totalAmount ? 'paid_in_full' : ($paidAmount > 0 ? 'partial_paid' : 'unpaid');

        // Set default values for optional fields
        if (empty($validated['sent_from'])) {
            $validated['sent_from'] = 'N/A';
        }
        if (empty($validated['sent_to_phone_id'])) {
            // Get first active phone number or set null
            $validated['sent_to_phone_id'] = \App\Models\PhoneNumber::where('active', true)->first()?->id ?? 1;
        }
        if (empty($validated['transaction_id'])) {
            $validated['transaction_id'] = 'MANUAL-' . time();
        }

        // Create the donation with payment info
        $donation = Donation::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'type' => $validated['type'],
            'donation_type' => $validated['donation_type'],
            'amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'due_amount' => $dueAmount,
            'payment_status' => $paymentStatus,
            'payment_type' => $validated['payment_type'],
            'collect_by' => $validated['collect_by'],
            'sent_from' => $validated['sent_from'],
            'sent_to_phone_id' => $validated['sent_to_phone_id'],
            'transaction_id' => $validated['transaction_id'],
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
        ]);

        // Create payment history record
        if ($paidAmount > 0) {
            $donation->paymentHistories()->create([
                'amount' => $paidAmount,
                'payment_method' => 'other',
                'transaction_id' => $validated['transaction_id'] ?? null,
                'notes' => $isPartial ? 'Partial upfront payment (Manual)' : 'Full upfront payment (Manual)',
                'collected_by' => $validated['collect_by'],
                'admin_id' => auth('admin')->id(),
            ]);
        }

        AdminActivity::log(
            'created',
            'Donation',
            $donation->id,
            "Created manual registration for {$donation->name} ({$donation->donation_type_label})",
            ['amount' => $donation->amount, 'paid_amount' => $paidAmount, 'type' => $validated['type'] ?? 'participant']
        );

        // Create jersey detail if applicable
        if (in_array($validated['donation_type'], ['jersey', 'both'])) {
            $request->validate([
                'size_id' => ['required', 'exists:jersey_sizes,id'],
                'name_on_jersey' => ['required', 'string', 'max:15'],
                'number_on_jersey' => ['required', 'string', 'max:5'],
            ]);

            $donation->jerseyDetail()->create([
                'size_id' => $request->size_id,
                'name_on_jersey' => $request->name_on_jersey,
                'number_on_jersey' => $request->number_on_jersey,
            ]);
        }

        // Send SMS if status is verified
        if ($validated['status'] === 'verified') {
            $donation->load(['jerseyDetail.size', 'sentToPhone']);
            $smsService = new SmsService();
            $amount = $donation->amount + 0; // Removing any trailing decimal zeroes
            $sentToNumber = $donation->sentToPhone?->number ?? 'N/A';
            $message = "SSC-2013 Iftar Mehfil & NPL S9 (2026) ইভেন্টে আপনার রেজিস্ট্রেশন ও {$amount}TK BDT পেমেন্ট Sent To: {$sentToNumber} সফল হয়েছে।";

            if ($donation->jerseyDetail) {
                $jerseySize = $donation->jerseyDetail->size->size ?? 'N/A';
                $nameOnJersey = $donation->jerseyDetail->name_on_jersey ?? 'N/A';
                $numberOnJersey = $donation->jerseyDetail->number_on_jersey ?? 'N/A';
                $message .= " আপনার Jersey Size: {$jerseySize} | Name: {$nameOnJersey} | Number: {$numberOnJersey} | Amount: {$amount}Tk";
            }

            $message .= "\n– Mahe Karim";

            $result = $smsService->send($donation->phone, $message);

            $donation->update([
                'sms_sent' => $result['success'],
                'sms_response' => $result['response'],
            ]);
        }

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Manual registration added successfully.');
    }
}