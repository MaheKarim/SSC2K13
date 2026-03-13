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
        $iftarFormEnabled  = SiteSetting::get('iftar_form_enabled', '1');
        $jerseyFormEnabled = SiteSetting::get('jersey_form_enabled', '1');

        return view('admin.site-settings.index', compact('iftarDate', 'registrationDeadline', 'iftarFormEnabled', 'jerseyFormEnabled'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'iftar_date'            => ['nullable', 'date'],
            'registration_deadline' => ['nullable', 'date'],
        ]);

        SiteSetting::set('iftar_date', $validated['iftar_date']);
        SiteSetting::set('registration_deadline', $validated['registration_deadline']);
        SiteSetting::set('iftar_form_enabled',  $request->has('iftar_form_enabled')  ? '1' : '0');
        SiteSetting::set('jersey_form_enabled', $request->has('jersey_form_enabled') ? '1' : '0');

        AdminActivity::log(
            'updated',
            'SiteSetting',
            null,
            'Updated site settings',
            array_merge($validated, [
                'iftar_form_enabled'  => $request->has('iftar_form_enabled')  ? '1' : '0',
                'jersey_form_enabled' => $request->has('jersey_form_enabled') ? '1' : '0',
            ])
        );

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site settings updated successfully.');
    }
}
