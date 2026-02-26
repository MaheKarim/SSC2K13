<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        PhoneNumber::create($validated);

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

        return back()->with('success', 'Phone number updated successfully.');
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        $phoneNumber->delete();
        return back()->with('success', 'Phone number deleted successfully.');
    }

    public function toggleActive(PhoneNumber $phoneNumber)
    {
        $phoneNumber->update(['active' => !$phoneNumber->active]);
        return back()->with('success', 'Phone number status updated.');
    }
}
