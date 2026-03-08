@extends('layouts.admin')

@section('page-title', 'Activity Log')

@section('content')
    <div class="space-y-6 md:space-y-8">
        <!-- Header Banner -->
        <div
            class="relative overflow-hidden rounded-xl md:rounded-2xl bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 p-4 md:p-6 lg:p-8">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-8 -right-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-purple-400 blur-3xl">
                </div>
                <div class="absolute -bottom-8 -left-8 w-32 h-32 md:w-40 md:h-40 rounded-full bg-fuchsia-400 blur-3xl">
                </div>
            </div>
            <div class="relative z-10 flex items-center space-x-3 md:space-x-4">
                <div
                    class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-white">Activity Log</h2>
                    <p class="text-slate-300 mt-0.5 text-sm md:text-base">Track all admin actions across the system
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
            <!-- Total Activities -->
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
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Total Activities</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ number_format($totalActivities) }}
                    </p>
                </div>
            </div>

            <!-- Today's Activities -->
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
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Today</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ number_format($todayActivities) }}
                    </p>
                </div>
            </div>

            <!-- Unique Actions -->
            <div
                class="group relative overflow-hidden rounded-xl md:rounded-2xl bg-white border border-gray-100 p-3 md:p-5 shadow-sm hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-16 h-16 md:w-24 md:h-24 -mt-2 -mr-2 md:-mt-4 md:-mr-4 rounded-full bg-gradient-to-br from-amber-500/10 to-orange-500/10 group-hover:scale-125 transition-transform duration-500">
                </div>
                <div class="relative">
                    <div
                        class="w-9 h-9 md:w-11 md:h-11 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-lg shadow-amber-500/25">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Action Types</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1">{{ $uniqueActions }}</p>
                </div>
            </div>

            <!-- Most Active Admin -->
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
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] md:text-xs font-medium text-gray-400 uppercase tracking-wider mt-3 md:mt-4">
                        Most Active</p>
                    <p class="text-base md:text-2xl font-bold text-gray-900 mt-1 truncate">{{ $mostActiveAdminName }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Filter Bar + Activity Table -->
        <div class="bg-white rounded-xl md:rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <!-- Filter Bar -->
            <div class="p-4 md:p-6 border-b border-gray-100">
                <form method="GET" action="{{ route('admin.activity-log.index') }}"
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
                    <div class="flex-1 min-w-0 sm:max-w-[180px]">
                        <select name="action" class="input-field text-sm min-h-[44px] w-full bg-white"
                            onchange="this.form.submit()">
                            <option value="">All Actions</option>
                            <option value="created" {{ request('action') == 'created' ? 'selected' : '' }}>Created
                            </option>
                            <option value="updated" {{ request('action') == 'updated' ? 'selected' : '' }}>Updated
                            </option>
                            <option value="deleted" {{ request('action') == 'deleted' ? 'selected' : '' }}>Deleted
                            </option>
                            <option value="verified" {{ request('action') == 'verified' ? 'selected' : '' }}>Verified
                            </option>
                            <option value="toggled" {{ request('action') == 'toggled' ? 'selected' : '' }}>Toggled
                            </option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-0 sm:max-w-[180px]">
                        <select name="subject_type" class="input-field text-sm min-h-[44px] w-full bg-white"
                            onchange="this.form.submit()">
                            <option value="">All Features</option>
                            <option value="Donation" {{ request('subject_type') == 'Donation' ? 'selected' : '' }}>
                                Registration</option>
                            <option value="PhoneNumber" {{ request('subject_type') == 'PhoneNumber' ? 'selected' : '' }}>
                                Phone Number</option>
                            <option value="JerseySize" {{ request('subject_type') == 'JerseySize' ? 'selected' : '' }}>
                                Jersey Size</option>
                            <option value="SiteSetting" {{ request('subject_type') == 'SiteSetting' ? 'selected' : '' }}>
                                Site Setting</option>
                        </select>
                    </div>
                    @if (request('admin_id') || request('action') || request('subject_type'))
                        <a href="{{ route('admin.activity-log.index') }}"
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

            <!-- Activity Table -->
            @if ($activities->count() > 0)
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
                                        Action</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Feature</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Description</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        IP Address</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-3 md:px-6 text-[10px] md:text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                        Date & Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($activities as $activity)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <!-- Admin -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center">
                                                @if ($activity->admin)
                                                    <div
                                                        class="w-7 h-7 md:w-9 md:h-9 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white text-[10px] md:text-xs font-bold mr-2 md:mr-3 shrink-0">
                                                        {{ strtoupper(substr($activity->admin->name, 0, 1)) }}
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs md:text-sm font-medium text-gray-900 truncate">
                                                            {{ $activity->admin->name }}</p>
                                                        <p class="text-[10px] md:text-xs text-gray-400 truncate">
                                                            {{ $activity->admin->email }}</p>
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
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <span
                                                class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-lg text-[10px] md:text-xs font-medium {{ $activity->action_color }}">
                                                <span
                                                    class="w-1 md:w-1.5 h-1 md:h-1.5 rounded-full {{ $activity->action_dot_color }} mr-1 md:mr-1.5"></span>
                                                {{ $activity->action_label }}
                                            </span>
                                        </td>

                                        <!-- Feature / Subject -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div class="flex items-center space-x-1.5">
                                                <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $activity->subject_icon }}"></path>
                                                </svg>
                                                <span
                                                    class="text-xs md:text-sm text-gray-600">{{ $activity->subject_label }}</span>
                                            </div>
                                        </td>

                                        <!-- Description -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <p class="text-xs md:text-sm text-gray-700 max-w-[250px] truncate"
                                                title="{{ $activity->description }}">
                                                {{ $activity->description }}
                                            </p>
                                        </td>

                                        <!-- IP Address -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6 text-xs md:text-sm text-gray-600 font-mono">
                                            {{ $activity->ip_address ?? '—' }}
                                        </td>

                                        <!-- Date & Time -->
                                        <td class="py-3 md:py-3.5 px-3 md:px-6">
                                            <div>
                                                <p class="text-xs text-gray-700">
                                                    {{ $activity->created_at->format('M d, Y') }}
                                                </p>
                                                <p class="text-[10px] text-gray-400">
                                                    {{ $activity->created_at->format('h:i:s A') }}
                                                </p>
                                                <p class="text-[10px] text-gray-300 mt-0.5">
                                                    {{ $activity->created_at->diffForHumans() }}
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
                @if ($activities->hasPages())
                    <div class="p-4 md:p-6 border-t border-gray-100">
                        {{ $activities->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12 md:py-16 px-6">
                    <div
                        class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-gray-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium text-sm md:text-base">No activities recorded yet</p>
                    <p class="text-gray-400 text-xs md:text-sm mt-1">Admin actions will appear here as they happen
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
