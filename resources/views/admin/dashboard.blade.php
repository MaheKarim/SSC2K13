@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="space-y-6 md:space-y-8">
        <!-- Welcome Banner -->
        <div
            class="relative overflow-hidden rounded-xl md:rounded-2xl bg-gradient-to-r from-slate-900 via-primary-900 to-slate-900 p-4 md:p-6 lg:p-8">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-8 -right-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-gold-400 blur-3xl"></div>
                <div class="absolute -bottom-8 -left-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-primary-400 blur-3xl"></div>
            </div>
            <div class="relative z-10">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-white">Welcome back 👋</h2>
                <p class="text-slate-300 mt-1 text-sm md:text-base">Here's what's happening with your registrations today.
                </p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-5">

            <!-- Total Collection -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-emerald-500/10 to-teal-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">Total
                        Collection</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($totalAmount, 0) }}</p>
                </div>
            </div>

            <!-- Verified Donations -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-violet-500/10 to-purple-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center shadow-lg shadow-violet-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Verified</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ $totalDonations }}</p>
                </div>
            </div>

            <!-- Iftar Collection -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-amber-500/10 to-yellow-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-lg shadow-amber-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">Iftar
                    </p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($iftarAmount, 0) }}</p>
                </div>
            </div>

            <!-- Jersey Collection -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-sky-500/10 to-blue-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 flex items-center justify-center shadow-lg shadow-sky-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">Jersey
                    </p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($jerseyAmount, 0) }}</p>
                </div>
            </div>

            <!-- Iftar + Jersey (Both) Verified -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-indigo-500/10 to-violet-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center shadow-lg shadow-indigo-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">Iftar
                        + Jersey</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ $bothCount }}</p>
                    <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">৳{{ number_format($bothAmount, 0) }}</p>
                </div>
            </div>

            <!-- Pending Donations -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-red-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-rose-500/10 to-red-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-rose-500 to-red-600 flex items-center justify-center shadow-lg shadow-rose-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Pending</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ $pendingDonations }}</p>
                    @if ($pendingDonations > 0)
                        <span
                            class="inline-flex items-center mt-1 md:mt-2 px-1.5 md:px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-red-50 text-red-600">
                            <span
                                class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full bg-red-500 mr-1 md:mr-1.5 animate-pulse"></span>
                            <span class="hidden sm:inline">Needs review</span>
                            <span class="sm:hidden">Review</span>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Verified Sponsor Money -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-amber-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300 col-span-2 lg:col-span-1">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-amber-500/10 to-yellow-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-lg shadow-amber-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Verified Sponsors</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">৳{{ number_format($sponsorAmount, 0) }}
                    </p>
                    @if ($sponsorCount > 0)
                        <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">{{ $sponsorCount }} sponsor(s)</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Phone Number Payment Analytics -->
        @if (isset($phoneAnalytics) && $phoneAnalytics->count() > 0)
            <div class="mt-6 md:mt-8 mb-4">
                <h3 class="text-base md:text-lg font-semibold text-gray-900 mb-3 md:mb-4 flex items-center">
                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    Payment Collection Methods
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
                    @foreach ($phoneAnalytics as $stat)
                        <div
                            class="group bg-white rounded-xl md:rounded-2xl border border-indigo-50 hover:border-indigo-100 p-4 md:p-5 shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all duration-300 relative overflow-hidden">
                            <!-- BG Decoration -->
                            <div
                                class="absolute -right-4 -top-4 md:-right-6 md:-top-6 w-20 h-20 md:w-24 md:h-24 bg-gradient-to-br from-indigo-50 to-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 z-0">
                            </div>

                            <div class="relative z-10">
                                <!-- Header -->
                                <div class="flex justify-between items-start mb-3 md:mb-4">
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="text-[10px] md:text-xs font-semibold text-indigo-600 uppercase tracking-widest truncate">
                                            {{ $stat->operator }}</p>
                                        <p
                                            class="text-base md:text-lg font-bold text-gray-900 font-mono mt-0.5 tracking-tight truncate">
                                            {{ $stat->phone_number }}</p>
                                    </div>
                                    <div
                                        class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-indigo-50 flex items-center justify-center border border-indigo-100/50 group-hover:bg-indigo-600 group-hover:text-white group-hover:border-indigo-600 transition-colors duration-300 shrink-0 ml-2">
                                        <svg class="w-4 h-4 md:w-5 md:h-5 text-indigo-500 group-hover:text-white transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Stats -->
                                <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-indigo-100/50">
                                    <div class="flex justify-between items-end mb-3 md:mb-4">
                                        <div class="min-w-0 flex-1">
                                            <p class="text-[10px] md:text-xs text-gray-500 font-medium">Total Collected</p>
                                            <p class="text-lg md:text-xl font-bold text-indigo-700 truncate">
                                                ৳{{ number_format($stat->total_amount, 0) }}</p>
                                        </div>
                                        <div class="text-right shrink-0 ml-2">
                                            <p class="text-[10px] md:text-xs text-gray-500 font-medium">Registrations</p>
                                            <p class="text-base md:text-lg font-semibold text-gray-800">
                                                {{ $stat->count }}</p>
                                        </div>
                                    </div>

                                    <!-- Breakdown -->
                                    <div
                                        class="space-y-1.5 md:space-y-2 bg-indigo-50/50 rounded-lg p-2.5 md:p-3 border border-indigo-100/30 text-sm md:text-base">
                                        <!-- Iftar -->
                                        <div class="flex justify-between items-center text-xs md:text-sm">
                                            <div class="flex items-center space-x-1.5 md:space-x-2 min-w-0">
                                                <span
                                                    class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-emerald-400 shrink-0"></span>
                                                <span class="text-gray-600 font-medium">Iftar</span>
                                                <span
                                                    class="text-[10px] text-gray-400 bg-white px-1 md:px-1.5 py-0.5 rounded border border-gray-100 shrink-0">{{ $stat->iftar_count }}</span>
                                            </div>
                                            <span
                                                class="font-semibold text-gray-800 text-xs md:text-sm shrink-0 ml-2">৳{{ number_format($stat->iftar_amount, 0) }}</span>
                                        </div>

                                        <!-- Jersey -->
                                        <div class="flex justify-between items-center text-xs md:text-sm">
                                            <div class="flex items-center space-x-1.5 md:space-x-2 min-w-0">
                                                <span
                                                    class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-blue-400 shrink-0"></span>
                                                <span class="text-gray-600 font-medium">Jersey</span>
                                                <span
                                                    class="text-[10px] text-gray-400 bg-white px-1 md:px-1.5 py-0.5 rounded border border-gray-100 shrink-0">{{ $stat->jersey_count }}</span>
                                            </div>
                                            <span
                                                class="font-semibold text-gray-800 text-xs md:text-sm shrink-0 ml-2">৳{{ number_format($stat->jersey_amount, 0) }}</span>
                                        </div>

                                        <!-- Both -->
                                        <div class="flex justify-between items-center text-xs md:text-sm">
                                            <div class="flex items-center space-x-1.5 md:space-x-2 min-w-0">
                                                <span
                                                    class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-indigo-400 shrink-0"></span>
                                                <span class="text-gray-600 font-medium">Both</span>
                                                <span
                                                    class="text-[10px] text-gray-400 bg-white px-1 md:px-1.5 py-0.5 rounded border border-gray-100 shrink-0">{{ $stat->both_count }}</span>
                                            </div>
                                            <span
                                                class="font-semibold text-gray-800 text-xs md:text-sm shrink-0 ml-2">৳{{ number_format($stat->both_amount, 0) }}</span>
                                        </div>

                                        @if (isset($stat->sponsor_count) && $stat->sponsor_count > 0)
                                            <!-- Sponsor -->
                                            <div
                                                class="flex justify-between items-center text-xs md:text-sm pt-1.5 md:pt-2 mt-1.5 md:mt-2 border-t border-indigo-100/50">
                                                <div class="flex items-center space-x-1.5 md:space-x-2 min-w-0">
                                                    <span
                                                        class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-amber-400 shadow-[0_0_8px_rgba(251,191,36,0.5)] shrink-0"></span>
                                                    <span class="text-gray-800 font-bold tracking-wide">Sponsor</span>
                                                    <span
                                                        class="text-[10px] text-amber-700 bg-amber-100 font-bold px-1 md:px-1.5 py-0.5 rounded shrink-0">{{ $stat->sponsor_count }}</span>
                                                </div>
                                                <span
                                                    class="font-bold text-amber-600 text-xs md:text-sm shrink-0 ml-2">৳{{ number_format($stat->sponsor_amount, 0) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Recent Registrations -->
        <div class="bg-white rounded-xl md:rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center p-4 md:p-6 gap-3">
                <div>
                    <h3 class="text-base md:text-lg font-semibold text-gray-900">Recent Registrations</h3>
                    <p class="text-xs md:text-sm text-gray-400 mt-0.5">Latest 10 registrations</p>
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
                <div class="overflow-x-auto -mx-4 md:mx-0">
                    <div class="min-w-[800px] md:min-w-0 px-4 md:px-0">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Type</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Amount</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Transaction</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($recentDonations as $donation)
                                    <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer"
                                        onclick="window.location='{{ route('admin.registrations.show', $donation) }}'">
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-7 h-7 md:w-9 md:h-9 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white text-[10px] md:text-xs font-bold mr-2 md:mr-3 shrink-0">
                                                    {{ strtoupper(substr($donation->name, 0, 1)) }}
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="text-xs md:text-sm font-medium text-gray-900 truncate">
                                                        {{ $donation->name }}</p>
                                                    <p class="text-[10px] md:text-xs text-gray-400">{{ $donation->phone }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            @if ($donation->type === 'sponsor')
                                                <span
                                                    class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium bg-amber-100 text-amber-800">
                                                    Sponsor
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium
                                                    @if ($donation->donation_type === 'iftar') bg-green-50 text-green-700
                                                    @elseif($donation->donation_type === 'jersey') bg-blue-50 text-blue-700
                                                    @else bg-purple-50 text-purple-700 @endif">
                                                    {{ $donation->donation_type_label }}
                                                </span>
                                            @endif
                                        </td>
                                        <td
                                            class="py-3 md:py-3.5 px-3 md:px-6 text-xs md:text-sm font-semibold text-gray-900">
                                            ৳{{ number_format($donation->amount, 0) }}
                                        </td>
                                        <td
                                            class="py-3 md:py-3.5 px-3 md:px-6 text-xs text-gray-500 font-mono truncate max-w-[80px] md:max-w-none">
                                            {{ $donation->transaction_id ?? '—' }}
                                        </td>
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center space-x-1.5 md:space-x-2">
                                                @if ($donation->status === 'verified')
                                                    <span
                                                        class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium bg-emerald-50 text-emerald-700">
                                                        <span
                                                            class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full bg-emerald-500 mr-1 md:mr-1.5"></span>
                                                        <span class="hidden sm:inline">Verified</span>
                                                        <span class="sm:hidden">V</span>
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium bg-amber-50 text-amber-700">
                                                        <span
                                                            class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full bg-amber-500 mr-1 md:mr-1.5 animate-pulse"></span>
                                                        <span class="hidden sm:inline">Pending</span>
                                                        <span class="sm:hidden">P</span>
                                                    </span>
                                                @endif

                                                @if ($donation->sms_sent)
                                                    <div
                                                        class="group relative flex items-center justify-center cursor-help">
                                                        <div
                                                            class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                                            <svg class="w-2.5 h-2.5 md:w-3 md:h-3" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        </div>

                                                        <!-- Tooltip -->
                                                        <div
                                                            class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block w-48 md:w-64 p-2 bg-gray-900 text-white text-[10px] md:text-xs rounded shadow-lg z-10 whitespace-normal">
                                                            <span class="block font-semibold mb-1">SMS Sent
                                                                Successfully</span>
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
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div>
                                                <p class="text-xs text-gray-700">
                                                    {{ $donation->created_at->format('M d, Y') }}
                                                </p>
                                                <p class="text-[10px] text-gray-400">
                                                    {{ $donation->created_at->format('h:i A') }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="text-center py-12 md:py-16 px-6">
                    <div
                        class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-gray-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium text-sm md:text-base">No donations yet</p>
                    <p class="text-gray-400 text-xs md:text-sm mt-1">Donations will appear here once submitted</p>
                </div>
            @endif
        </div>
    </div>
@endsection
