<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JerseySize;
use Illuminate\Http\Request;

class JerseySizeController extends Controller
{
    public function index()
    {
        $jerseySizes = JerseySize::latest()->get();
        return view('admin.jersey-sizes.index', compact('jerseySizes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'size' => ['required', 'string', 'max:20'],
            'active' => ['boolean'],
        ]);

        JerseySize::create($validated);

        return back()->with('success', 'Jersey size added successfully.');
    }

    public function update(Request $request, JerseySize $jerseySize)
    {
        $validated = $request->validate([
            'size' => ['required', 'string', 'max:20'],
            'active' => ['boolean'],
        ]);

        $jerseySize->update($validated);

        return back()->with('success', 'Jersey size updated successfully.');
    }

    public function destroy(JerseySize $jerseySize)
    {
        $jerseySize->delete();
        return back()->with('success', 'Jersey size deleted successfully.');
    }

    public function toggleActive(JerseySize $jerseySize)
    {
        $jerseySize->update(['active' => !$jerseySize->active]);
        return back()->with('success', 'Jersey size status updated.');
    }
}
