<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\PhoneNumber;
use App\Models\JerseySize;
use App\Models\JerseyDetail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $phoneNumbers = PhoneNumber::where('active', true)->get();
        $jerseySizes = JerseySize::where('active', true)->get();
        $iftarDate = SiteSetting::get('iftar_date');
        $registrationDeadline = SiteSetting::get('registration_deadline');
        $verifiedParticipants = Donation::where('status', 'verified')->count();
        $verifiedList = Donation::where('status', 'verified')->latest()->get();

        return view('welcome', compact('phoneNumbers', 'jerseySizes', 'iftarDate', 'registrationDeadline', 'verifiedParticipants', 'verifiedList'));
    }

    public function submit(Request $request)
    {
        $registrationDeadline = SiteSetting::get('registration_deadline');
        if ($registrationDeadline && now()->greaterThan(\Carbon\Carbon::parse($registrationDeadline))) {
            return back()->with('error', 'Registration for this event is now closed.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'donation_type' => ['required', 'in:iftar,jersey,both'],
            'sent_from' => ['required', 'string', 'max:20'],
            'sent_to_phone_id' => ['required', 'exists:phone_numbers,id'],
            'transaction_id' => ['nullable', 'required_without:screenshot', 'string', 'max:100'],
            'screenshot' => ['nullable', 'required_without:transaction_id', 'image', 'max:5120'],
            'jersey_size_id' => ['nullable', 'required_if:donation_type,jersey,both', 'exists:jersey_sizes,id'],
            'name_on_jersey' => ['nullable', 'required_if:donation_type,jersey,both', 'string', 'max:15'],
            'number_on_jersey' => ['nullable', 'required_if:donation_type,jersey,both', 'string', 'max:5'],
        ], [
            'transaction_id.required_without' => 'Please provide a Transaction ID or upload a screenshot.',
            'screenshot.required_without' => 'Please upload a screenshot or provide a Transaction ID.',
        ]);

        $amount = $this->calculateAmount($validated['donation_type']);

        $screenshotPath = null;
        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('screenshots', 'public');
        }

        $donation = Donation::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'donation_type' => $validated['donation_type'],
            'amount' => $amount,
            'sent_from' => $validated['sent_from'],
            'sent_to_phone_id' => $validated['sent_to_phone_id'],
            'transaction_id' => $validated['transaction_id'] ?? null,
            'screenshot' => $screenshotPath,
            'status' => 'pending',
        ]);

        if (in_array($validated['donation_type'], ['jersey', 'both'])) {
            JerseyDetail::create([
                'donation_id' => $donation->id,
                'size_id' => $validated['jersey_size_id'],
                'name_on_jersey' => $validated['name_on_jersey'],
                'number_on_jersey' => $validated['number_on_jersey'],
            ]);
        }

        return redirect()->route('donation.success', $donation->hash);
    }

    public function success(string $hash)
    {
        $donation = Donation::where('hash', $hash)->firstOrFail();
        $donation->load(['sentToPhone', 'jerseyDetail.size']);
        return view('donation-success', compact('donation'));
    }

    private function calculateAmount(string $type): float
    {
        return match ($type) {
            'iftar' => 250.00,
            'jersey' => 250.00,
            'both' => 500.00,
            default => 0.00,
        };
    }
}
