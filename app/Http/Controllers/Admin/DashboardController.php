<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\PhoneNumber;
use App\Models\JerseySize;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonations = Donation::where('status', 'verified')->count();
        $totalAmount = Donation::where('status', 'verified')->sum('amount');
        $iftarAmount = Donation::where('status', 'verified')->where('donation_type', 'iftar')->sum('amount');
        $jerseyAmount = Donation::where('status', 'verified')->where('donation_type', 'jersey')->sum('amount');
        $bothAmount = Donation::where('status', 'verified')->where('donation_type', 'both')->sum('amount');
        $pendingDonations = Donation::where('status', 'pending')->count();

        $recentDonations = Donation::with(['sentToPhone', 'jerseyDetail'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalDonations',
            'totalAmount',
            'iftarAmount',
            'jerseyAmount',
            'bothAmount',
            'pendingDonations',
            'recentDonations'
        ));
    }
}
