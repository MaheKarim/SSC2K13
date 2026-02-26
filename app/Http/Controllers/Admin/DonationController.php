<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $donation->load(['sentToPhone', 'jerseyDetail.size']);
        return view('admin.donations.show', compact('donation'));
    }

    public function verify(Donation $donation)
    {
        $donation->update(['status' => 'verified']);

        // Send SMS notification
        $smsService = new SmsService();
        $message = "SSC 2013 Batch এর রামাদান রিইউনিয়ন প্রোগ্রাম & NPL Season 9 , 2026 এ রেজিস্ট্রেশন করার জন্য ধন্যবাদ । আপনার পেমেন্ট এবং রেজিস্ট্রেশন সফল হয়েছে । Developed By - Mahi Karim";
        $result = $smsService->send($donation->phone, $message);

        $donation->update([
            'sms_sent' => $result['success'],
            'sms_response' => $result['response'],
        ]);

        $smsStatus = $result['success'] ? 'SMS sent successfully.' : 'Registration verified but SMS failed.';

        return back()->with('success', "Registration verified. {$smsStatus}");
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
}
