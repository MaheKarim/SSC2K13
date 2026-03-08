<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    public function index()
    {
        $phoneNumbers = PhoneNumber::latest()->get();
        return view('admin.phone-numbers.index', compact('phoneNumbers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:20'],
            'operator' => ['required', 'string', 'max:50'],
        ]);

        $validated['active'] = $request->has('active');

        $phoneNumber = PhoneNumber::create($validated);

        AdminActivity::log(
            'created',
            'PhoneNumber',
            $phoneNumber->id,
            "Added phone number {$phoneNumber->number} ({$phoneNumber->operator})"
        );

        return back()->with('success', 'Phone number added successfully.');
    }

    public function update(Request $request, PhoneNumber $phoneNumber)
    {
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:20'],
            'operator' => ['required', 'string', 'max:50'],
        ]);

        $validated['active'] = $request->has('active');

        $phoneNumber->update($validated);

        AdminActivity::log(
            'updated',
            'PhoneNumber',
            $phoneNumber->id,
            "Updated phone number {$phoneNumber->number} ({$phoneNumber->operator})"
        );

        return back()->with('success', 'Phone number updated successfully.');
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        $donationCount = $phoneNumber->donations()->count();
        $number = $phoneNumber->number;
        $operator = $phoneNumber->operator;
        $phoneId = $phoneNumber->id;
        $phoneNumber->delete();

        AdminActivity::log(
            'deleted',
            'PhoneNumber',
            $phoneId,
            "Deleted phone number {$number} ({$operator})",
            ['donations_preserved' => $donationCount]
        );

        $message = 'Phone number deleted successfully.';
        if ($donationCount > 0) {
            $message .= " {$donationCount} donation(s) linked to this number have been preserved.";
        }

        return back()->with('success', $message);
    }

    public function toggleActive(PhoneNumber $phoneNumber)
    {
        $phoneNumber->update(['active' => !$phoneNumber->active]);

        $status = $phoneNumber->active ? 'Activated' : 'Deactivated';
        AdminActivity::log(
            'toggled',
            'PhoneNumber',
            $phoneNumber->id,
            "{$status} phone number {$phoneNumber->number}"
        );

        return back()->with('success', 'Phone number status updated.');
    }
}
