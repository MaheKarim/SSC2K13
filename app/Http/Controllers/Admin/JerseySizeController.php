<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
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

        $jerseySize = JerseySize::create($validated);

        AdminActivity::log(
            'created',
            'JerseySize',
            $jerseySize->id,
            "Added jersey size {$jerseySize->size}"
        );

        return back()->with('success', 'Jersey size added successfully.');
    }

    public function update(Request $request, JerseySize $jerseySize)
    {
        $validated = $request->validate([
            'size' => ['required', 'string', 'max:20'],
            'active' => ['boolean'],
        ]);

        $jerseySize->update($validated);

        AdminActivity::log(
            'updated',
            'JerseySize',
            $jerseySize->id,
            "Updated jersey size {$jerseySize->size}"
        );

        return back()->with('success', 'Jersey size updated successfully.');
    }

    public function destroy(JerseySize $jerseySize)
    {
        $size = $jerseySize->size;
        $sizeId = $jerseySize->id;
        $jerseySize->delete();

        AdminActivity::log(
            'deleted',
            'JerseySize',
            $sizeId,
            "Deleted jersey size {$size}"
        );

        return back()->with('success', 'Jersey size deleted successfully.');
    }

    public function toggleActive(JerseySize $jerseySize)
    {
        $jerseySize->update(['active' => !$jerseySize->active]);

        $status = $jerseySize->active ? 'Activated' : 'Deactivated';
        AdminActivity::log(
            'toggled',
            'JerseySize',
            $jerseySize->id,
            "{$status} jersey size {$jerseySize->size}"
        );

        return back()->with('success', 'Jersey size status updated.');
    }
}
