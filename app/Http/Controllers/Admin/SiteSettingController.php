<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $iftarDate = SiteSetting::get('iftar_date');

        return view('admin.site-settings.index', compact('iftarDate'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'iftar_date' => ['nullable', 'date'],
        ]);

        SiteSetting::set('iftar_date', $validated['iftar_date']);

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site settings updated successfully.');
    }
}
