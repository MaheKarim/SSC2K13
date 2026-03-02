@extends('layouts.admin')

@section('page-title', 'Login History')

@section('content')
    <div class="space-y-6 md:space-y-8">
        <!-- Header Banner -->
        <div
            class="relative overflow-hidden rounded-xl md:rounded-2xl bg-gradient-to-r from-slate-900 via-indigo-900 to-slate-900 p-4 md:p-6 lg:p-8">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-8 -right-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-indigo-400 blur-3xl">
                </div>
                <div class="absolute -bottom-8 -left-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-violet-400 blur-3xl">
                </div>
            </div>
            <div class="relative z-10 flex items-center space-x-3 md:space-x-4">
                <div
                    class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-indigo-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-white">Login History</h2>
                    <p class="text-slate-300 mt-0.5 text-sm md:text-base">Track all admin account activity & access logs
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
            <!-- Total Logins -->
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
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Total Logins</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ number_format($totalLogins) }}</p>
                </div>
            </div>

            <!-- Failed Attempts -->
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
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Failed Attempts</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ number_format($failedAttempts) }}
                    </p>
                    @if ($failedAttempts > 0)
                        <span
                            class="inline-flex items-center mt-1 md:mt-2 px-1.5 md:px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-red-50 text-red-600">
                            <span
                                class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full bg-red-500 mr-1 md:mr-1.5 animate-pulse"></span>
                            <span class="hidden sm:inline">Monitor</span>
                            <span class="sm:hidden">!</span>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Unique IPs -->
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
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Unique IPs</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ number_format($uniqueIps) }}</p>
                </div>
            </div>

            <!-- Active Admins -->
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
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Active Admins</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ $activeAdmins }}</p>
                </div>
            </div>
        </div>

        <!-- Filter Bar + History Table -->
        <div class="bg-white rounded-xl md:rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <!-- Filter Bar -->
            <div class="p-4 md:p-6 border-b border-gray-100">
                <form method="GET" action="{{ route('admin.login-history.index') }}"
                    class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1 min-w-0">
                        <select name="admin_id" class="input-field text-sm min-h-[44px] w-full bg-white"
                            onchange="this.form.submit()">
                            <option value="">All Admins</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}"
                                    {{ request('admin_id') == $admin->id ? 'selected' : '' }}>
                                    {{ $admin->name }} ({{ $admin->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1 min-w-0 sm:max-w-[200px]">
                        <select name="event" class="input-field text-sm min-h-[44px] w-full bg-white"
                            onchange="this.form.submit()">
                            <option value="">All Events</option>
                            <option value="login" {{ request('event') == 'login' ? 'selected' : '' }}>Login
                            </option>
                            <option value="logout" {{ request('event') == 'logout' ? 'selected' : '' }}>Logout
                            </option>
                            <option value="login_failed" {{ request('event') == 'login_failed' ? 'selected' : '' }}>
                                Failed</option>
                        </select>
                    </div>
                    @if (request('admin_id') || request('event'))
                        <a href="{{ route('admin.login-history.index') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors min-h-[44px]">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <!-- History Table -->
            @if ($histories->count() > 0)
                <div class="overflow-x-auto -mx-4 md:mx-0">
                    <div class="min-w-[900px] md:min-w-0 px-4 md:px-0">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Admin</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Event</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        IP Address</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Browser</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Device</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Date & Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($histories as $history)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <!-- Admin -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center">
                                                @if ($history->admin)
                                                    <div
                                                        class="w-7 h-7 md:w-9 md:h-9 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center text-white text-[10px] md:text-xs font-bold mr-2 md:mr-3 shrink-0">
                                                        {{ strtoupper(substr($history->admin->name, 0, 1)) }}
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs md:text-sm font-medium text-gray-900 truncate">
                                                            {{ $history->admin->name }}</p>
                                                        <p class="text-[10px] md:text-xs text-gray-400 truncate">
                                                            {{ $history->admin->email }}</p>
                                                    </div>
                                                @else
                                                    <div
                                                        class="w-7 h-7 md:w-9 md:h-9 rounded-full bg-gradient-to-br from-gray-400 to-gray-500 flex items-center justify-center text-white text-[10px] md:text-xs font-bold mr-2 md:mr-3 shrink-0">
                                                        ?
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p
                                                            class="text-xs md:text-sm font-medium text-gray-500 truncate italic">
                                                            Unknown</p>
                                                        <p class="text-[10px] md:text-xs text-gray-400 truncate">
                                                            {{ $history->email ?? '—' }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                        <!-- Event -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <span
                                                class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium {{ $history->event_color }}">
                                                <span
                                                    class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full {{ $history->event_dot_color }} mr-1 md:mr-1.5"></span>
                                                {{ $history->event_label }}
                                            </span>
                                        </td>

                                        <!-- IP Address -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6 text-xs md:text-sm text-gray-600 font-mono">
                                            {{ $history->ip_address ?? '—' }}
                                        </td>

                                        <!-- Browser + Platform -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="min-w-0">
                                                <p class="text-xs md:text-sm text-gray-700 truncate">
                                                    {{ $history->browser ?? 'Unknown' }}</p>
                                                <p class="text-[10px] md:text-xs text-gray-400 truncate">
                                                    {{ $history->platform ?? 'Unknown' }}</p>
                                            </div>
                                        </td>

                                        <!-- Device Type -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center space-x-1.5">
                                                @if ($history->device_type === 'mobile')
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                @elseif($history->device_type === 'tablet')
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                @endif
                                                <span class="text-xs text-gray-500 capitalize">
                                                    {{ $history->device_type ?? 'desktop' }}
                                                </span>
                                            </div>
                                        </td>

                                        <!-- Date & Time -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div>
                                                <p class="text-xs text-gray-700">
                                                    {{ $history->created_at->format('M d, Y') }}
                                                </p>
                                                <p class="text-[10px] text-gray-400">
                                                    {{ $history->created_at->format('h:i:s A') }}
                                                </p>
                                                <p class="text-[10px] text-gray-300 mt-0.5">
                                                    {{ $history->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if ($histories->hasPages())
                    <div class="p-4 md:p-6 border-t border-gray-100">
                        {{ $histories->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12 md:py-16 px-6">
                    <div
                        class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-gray-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium text-sm md:text-base">No login history yet</p>
                    <p class="text-gray-400 text-xs md:text-sm mt-1">Login events will appear here once admins log in
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
