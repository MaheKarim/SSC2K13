@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Banner -->
        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-primary-900 to-slate-900 p-6 md:p-8">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-8 -right-8 w-40 h-40 rounded-full bg-gold-400 blur-3xl"></div>
                <div class="absolute -bottom-8 -left-8 w-40 h-40 rounded-full bg-primary-400 blur-3xl"></div>
            </div>
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold text-white">Welcome back 👋</h2>
                <p class="text-slate-300 mt-1">Here's what's happening with your registrations today.</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Total Collection -->
            <div
                class="group relative overflow-hidden rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 -mt-4 -mr-4 rounded-full bg-gradient-to-br from-emerald-500/10 to-teal-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mt-4">Total Collection</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($totalAmount, 2) }}</p>
                </div>
            </div>

            <!-- Verified Donations -->
            <div
                class="group relative overflow-hidden rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 -mt-4 -mr-4 rounded-full bg-gradient-to-br from-violet-500/10 to-purple-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center shadow-lg shadow-violet-500/25">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mt-4">Verified</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalDonations }}</p>
                </div>
            </div>

            <!-- Iftar Collection -->
            <div
                class="group relative overflow-hidden rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 -mt-4 -mr-4 rounded-full bg-gradient-to-br from-amber-500/10 to-yellow-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-lg shadow-amber-500/25">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mt-4">Iftar</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($iftarAmount, 2) }}</p>
                </div>
            </div>

            <!-- Jersey Collection -->
            <div
                class="group relative overflow-hidden rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 -mt-4 -mr-4 rounded-full bg-gradient-to-br from-sky-500/10 to-blue-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 flex items-center justify-center shadow-lg shadow-sky-500/25">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mt-4">Jersey</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($jerseyAmount, 2) }}</p>
                </div>
            </div>

            <!-- Pending Donations -->
            <div
                class="group relative overflow-hidden rounded-2xl bg-white border border-red-100 p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 -mt-4 -mr-4 rounded-full bg-gradient-to-br from-rose-500/10 to-red-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-rose-500 to-red-600 flex items-center justify-center shadow-lg shadow-rose-500/25">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mt-4">Pending</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $pendingDonations }}</p>
                    @if ($pendingDonations > 0)
                        <span
                            class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5 animate-pulse"></span>
                            Needs review
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="flex justify-between items-center p-6 pb-0">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Recent Registrations</h3>
                    <p class="text-sm text-gray-400 mt-0.5">Latest 10 registrations</p>
                </div>
                <a href="{{ route('admin.registrations.index') }}"
                    class="inline-flex items-center text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors">
                    View All
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            @if ($recentDonations->count() > 0)
                <div class="overflow-x-auto mt-4">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Type</th>
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Transaction</th>
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="text-left py-3 px-6 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($recentDonations as $donation)
                                <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer"
                                    onclick="window.location='{{ route('admin.registrations.show', $donation) }}'">
                                    <td class="py-3.5 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white text-xs font-bold mr-3 shrink-0">
                                                {{ strtoupper(substr($donation->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $donation->name }}</p>
                                                <p class="text-xs text-gray-400">{{ $donation->phone }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3.5 px-6">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium
                                            @if ($donation->donation_type === 'iftar') bg-amber-50 text-amber-700
                                            @elseif($donation->donation_type === 'jersey') bg-sky-50 text-sky-700
                                            @else bg-violet-50 text-violet-700 @endif">
                                            {{ $donation->donation_type_label }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-6 text-sm font-semibold text-gray-900">
                                        ৳{{ number_format($donation->amount, 2) }}
                                    </td>
                                    <td class="py-3.5 px-6 text-sm text-gray-500 font-mono">
                                        {{ $donation->transaction_id ?? '—' }}
                                    </td>
                                    <td class="py-3.5 px-6">
                                        <div class="flex items-center space-x-2">
                                            @if ($donation->status === 'verified')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 text-emerald-700">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                                    Verified
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 text-amber-700">
                                                    <span
                                                        class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span>
                                                    Pending
                                                </span>
                                            @endif

                                            @if ($donation->sms_sent)
                                                <div class="group relative flex items-center justify-center cursor-help">
                                                    <div
                                                        class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>

                                                    <!-- Tooltip -->
                                                    <div
                                                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block w-64 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-10 whitespace-normal">
                                                        <span class="block font-semibold mb-1">SMS Sent Successfully</span>
                                                        <span
                                                            class="text-gray-300">{{ $donation->sms_response ? \Illuminate\Support\Str::limit(strip_tags(str_replace('"', '', $donation->sms_response)), 80) : 'No response data' }}</span>
                                                        <div
                                                            class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-gray-900">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3.5 px-6">
                                        <div>
                                            <p class="text-sm text-gray-700">{{ $donation->created_at->format('M d, Y') }}
                                            </p>
                                            <p class="text-xs text-gray-400">{{ $donation->created_at->format('h:i A') }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-16 px-6">
                    <div class="w-16 h-16 rounded-2xl bg-gray-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium">No donations yet</p>
                    <p class="text-gray-400 text-sm mt-1">Donations will appear here once submitted</p>
                </div>
            @endif
        </div>
    </div>
@endsection
