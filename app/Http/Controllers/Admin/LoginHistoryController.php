<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminActivity;
use App\Models\AdminLoginHistory;
use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = AdminLoginHistory::with('admin')->latest();

        // Filter by admin
        if ($request->filled('admin_id')) {
            $query->forAdmin($request->admin_id);
        }

        // Filter by event type
        if ($request->filled('event')) {
            $query->where('event', $request->event);
        }

        $histories = $query->paginate(25)->withQueryString();

        // Stats
        $totalLogins = AdminLoginHistory::logins()->count();
        $failedAttempts = AdminLoginHistory::failedLogins()->count();
        $uniqueIps = AdminLoginHistory::distinct('ip_address')->count('ip_address');
        $activeAdmins = Admin::where('is_active', true)->count();

        // All admins for filter dropdown
        $admins = Admin::orderBy('name')->get(['id', 'name', 'email']);

        return view('admin.login-history.index', compact(
            'histories',
            'totalLogins',
            'failedAttempts',
            'uniqueIps',
            'activeAdmins',
            'admins'
        ));
    }

    public function activityLog(Request $request)
    {
        $query = AdminActivity::with('admin')->latest();

        // Filter by admin
        if ($request->filled('admin_id')) {
            $query->forAdmin($request->admin_id);
        }

        // Filter by action type
        if ($request->filled('action')) {
            $query->forAction($request->action);
        }

        // Filter by subject type
        if ($request->filled('subject_type')) {
            $query->forSubject($request->subject_type);
        }

        $activities = $query->paginate(25)->withQueryString();

        // Stats
        $totalActivities = AdminActivity::count();
        $todayActivities = AdminActivity::whereDate('created_at', today())->count();
        $uniqueActions = AdminActivity::distinct('action')->count('action');
        $mostActiveAdmin = AdminActivity::select('admin_id')
            ->selectRaw('count(*) as count')
            ->groupBy('admin_id')
            ->orderByDesc('count')
            ->first();
        $mostActiveAdminName = $mostActiveAdmin ? Admin::find($mostActiveAdmin->admin_id)?->name ?? 'Unknown' : '—';

        // All admins for filter dropdown
        $admins = Admin::orderBy('name')->get(['id', 'name', 'email']);

        return view('admin.activity-log.index', compact(
            'activities',
            'totalActivities',
            'todayActivities',
            'uniqueActions',
            'mostActiveAdminName',
            'admins'
        ));
    }
}

