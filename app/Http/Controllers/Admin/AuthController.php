<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Check if admin is active
            if (!Auth::guard('admin')->user()->is_active) {
                $admin = Auth::guard('admin')->user();
                Auth::guard('admin')->logout();

                $this->recordLoginEvent($request, 'login_failed', $admin->id, $admin->email);

                return back()->withErrors([
                    'email' => 'Your account has been deactivated.',
                ]);
            }

            // Record successful login
            $this->recordLoginEvent($request, 'login', Auth::guard('admin')->id(), Auth::guard('admin')->user()->email);

            return redirect()->intended(route('admin.dashboard'));
        }

        // Record failed login attempt
        $admin = Admin::where('email', $request->email)->first();
        $this->recordLoginEvent($request, 'login_failed', $admin?->id, $request->email);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Record logout before actually logging out
        $this->recordLoginEvent($request, 'logout', Auth::guard('admin')->id(), Auth::guard('admin')->user()->email);

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Record a login/logout event with device/browser info.
     */
    private function recordLoginEvent(Request $request, string $event, ?int $adminId, ?string $email): void
    {
        $userAgent = $request->userAgent() ?? '';
        $browser = $this->parseBrowser($userAgent);
        $platform = $this->parsePlatform($userAgent);
        $deviceType = $this->parseDeviceType($userAgent);

        AdminLoginHistory::create([
            'admin_id' => $adminId,
            'event' => $event,
            'ip_address' => $request->ip(),
            'user_agent' => $userAgent,
            'browser' => $browser,
            'platform' => $platform,
            'device_type' => $deviceType,
            'location' => null, // Can be enhanced with IP geolocation API later
            'email' => $email,
        ]);
    }

    /**
     * Parse browser name and version from user agent string.
     */
    private function parseBrowser(string $userAgent): string
    {
        $browsers = [
            'OPR' => 'Opera',
            'Edg' => 'Edge',
            'Edge' => 'Edge',
            'Chrome' => 'Chrome',
            'Firefox' => 'Firefox',
            'Safari' => 'Safari',
            'MSIE' => 'IE',
            'Trident' => 'IE',
        ];

        foreach ($browsers as $key => $name) {
            if (str_contains($userAgent, $key)) {
                // Try to extract version
                if (preg_match("/{$key}[\/ ]([\d.]+)/", $userAgent, $matches)) {
                    return "{$name} {$matches[1]}";
                }
                return $name;
            }
        }

        return 'Unknown';
    }

    /**
     * Parse platform/OS from user agent string.
     */
    private function parsePlatform(string $userAgent): string
    {
        $platforms = [
            'Windows NT 10' => 'Windows 10/11',
            'Windows NT 6.3' => 'Windows 8.1',
            'Windows NT 6.2' => 'Windows 8',
            'Windows NT 6.1' => 'Windows 7',
            'Macintosh' => 'macOS',
            'Mac OS X' => 'macOS',
            'Android' => 'Android',
            'iPhone' => 'iOS',
            'iPad' => 'iPadOS',
            'Linux' => 'Linux',
            'CrOS' => 'Chrome OS',
        ];

        foreach ($platforms as $key => $name) {
            if (str_contains($userAgent, $key)) {
                return $name;
            }
        }

        return 'Unknown';
    }

    /**
     * Parse device type from user agent string.
     */
    private function parseDeviceType(string $userAgent): string
    {
        if (preg_match('/Mobile|Android.*Mobile|iPhone/i', $userAgent)) {
            return 'mobile';
        }
        if (preg_match('/iPad|Android(?!.*Mobile)|Tablet/i', $userAgent)) {
            return 'tablet';
        }
        return 'desktop';
    }
}
