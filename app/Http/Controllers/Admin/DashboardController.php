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
        $bothCount = Donation::where('status', 'verified')->where('donation_type', 'both')->count();
        $pendingDonations = Donation::where('status', 'pending')->count();

        // Verified sponsor amount
        $sponsorAmount = Donation::where('status', 'verified')->where('type', 'sponsor')->sum('amount');
        $sponsorCount = Donation::where('status', 'verified')->where('type', 'sponsor')->count();

        $recentDonations = Donation::with(['sentToPhone', 'jerseyDetail'])
            ->latest()
            ->take(10)
            ->get();

        // Phone analytics
        $phoneAnalytics = \Illuminate\Support\Facades\DB::table('donations')
            ->select('sent_to_phone_id', \Illuminate\Support\Facades\DB::raw('count(*) as count'), \Illuminate\Support\Facades\DB::raw('sum(amount) as total_amount'))
            ->where('status', 'verified')
            ->whereNotNull('sent_to_phone_id')
            ->groupBy('sent_to_phone_id')
            ->get()
            ->map(function ($stat) {
                $phone = \App\Models\PhoneNumber::find($stat->sent_to_phone_id);
                $stat->phone_number = $phone ? $phone->number : 'Unknown';
                $stat->operator = $phone ? $phone->operator : 'Unknown';
                return $stat;
            });

        return view('admin.dashboard', compact(
            'totalDonations',
            'totalAmount',
            'iftarAmount',
            'jerseyAmount',
            'bothAmount',
            'bothCount',
            'pendingDonations',
            'sponsorAmount',
            'sponsorCount',
            'recentDonations',
            'phoneAnalytics'
        ));
    }
}
