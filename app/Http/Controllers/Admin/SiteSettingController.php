<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $iftarDate = SiteSetting::get('iftar_date');
        $registrationDeadline = SiteSetting::get('registration_deadline');

        return view('admin.site-settings.index', compact('iftarDate', 'registrationDeadline'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'iftar_date' => ['nullable', 'date'],
            'registration_deadline' => ['nullable', 'date'],
        ]);

        SiteSetting::set('iftar_date', $validated['iftar_date']);
        SiteSetting::set('registration_deadline', $validated['registration_deadline']);

        AdminActivity::log(
            'updated',
            'SiteSetting',
            null,
            'Updated site settings',
            $validated
        );

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site settings updated successfully.');
    }
}
