<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
}
