@extends('layouts.admin')

@section('page-title', 'Registrations')

@section('content')
    <div class="space-y-4 md:space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 md:gap-4">
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Registrations</h1>
            <a href="{{ route('admin.registrations.create') }}"
                class="mobile-btn btn-primary flex items-center justify-center w-full sm:w-auto">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Add Manual
            </a>
        </div>

        <!-- Filters and Export -->
        <div class="card p-3 md:p-6">
            <form action="{{ route('admin.registrations.index') }}" method="GET" class="flex flex-col gap-3 md:gap-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label class="label text-xs md:text-sm">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" class="input-field text-sm"
                            placeholder="Name, Phone, Transaction ID">
                    </div>
                    <div>
                        <label class="label text-xs md:text-sm">Type</label>
                        <select name="type" class="input-field text-sm">
                            <option value="">All Types</option>
                            <option value="iftar" {{ request('type') === 'iftar' ? 'selected' : '' }}>Iftar Mahfil</option>
                            <option value="jersey" {{ request('type') === 'jersey' ? 'selected' : '' }}>Jersey</option>
                            <option value="both" {{ request('type') === 'both' ? 'selected' : '' }}>Both</option>
                        </select>
                    </div>
                    <div>
                        <label class="label text-xs md:text-sm">Status</label>
                        <select name="status" class="input-field text-sm">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Verified
                            </option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 md:gap-3">
                    <button type="submit" class="mobile-btn btn-primary w-full sm:w-auto">Filter</button>
                    <a href="{{ route('admin.registrations.export', request()->query()) }}" target="_blank"
                        class="mobile-btn btn-gold flex items-center justify-center w-full sm:w-auto">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Export
                    </a>
                </div>
            </form>
        </div>

        <!-- Registrations List -->
        <div class="card overflow-hidden">
            @if ($donations->count() > 0)
                <div class="overflow-x-auto -mx-4 md:mx-0">
                    <div class="min-w-[1000px] md:min-w-0 px-4 md:px-0">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Name</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Reg. For</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Reg. Type</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Amount</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Collected By</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Jersey</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Status</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Date</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <div>
                                                <p
                                                    class="font-medium text-gray-800 truncate max-w-[100px] md:max-w-[150px]">
                                                    {{ $donation->name }}</p>
                                                <p class="text-[10px] md:text-xs text-gray-500">{{ $donation->phone }}</p>
                                            </div>
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <span
                                                class="inline-flex items-center px-1.5 md:px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-medium
                                                @if ($donation->type === 'sponsor') bg-amber-100 text-amber-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($donation->type ?? 'Participant') }}
                                            </span>
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <span
                                                class="inline-flex items-center px-1.5 md:px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-medium
                                            @if ($donation->donation_type === 'iftar') bg-green-100 text-green-800
                                            @elseif($donation->donation_type === 'jersey') bg-blue-100 text-blue-800
                                            @else bg-purple-100 text-purple-800 @endif">
                                                {{ $donation->donation_type_label }}
                                            </span>
                                        </td>
                                        <td
                                            class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm font-semibold text-gray-800">
                                            ৳{{ number_format($donation->amount, 0) }}
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            @if ($donation->collect_by)
                                                <span
                                                    class="text-[10px] md:text-xs text-gray-600 truncate max-w-[80px] md:max-w-none block">{{ $donation->collect_by }}</span>
                                            @else
                                                <span class="text-[10px] md:text-xs text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            @if ($donation->jerseyDetail)
                                                <div>
                                                    <p class="text-[10px] md:text-xs text-gray-800">
                                                        {{ $donation->jerseyDetail->size?->size ?? 'N/A' }}</p>
                                                    <p class="text-[10px] text-gray-500 truncate max-w-[80px]">
                                                        {{ $donation->jerseyDetail->name_on_jersey }}
                                                    </p>
                                                </div>
                                            @else
                                                <span class="text-gray-400 text-xs">-</span>
                                            @endif
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <div class="flex items-center space-x-1 md:space-x-2">
                                                <span
                                                    class="inline-flex items-center px-1.5 md:px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-medium
                                                @if ($donation->status === 'verified') bg-green-100 text-green-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                    {{ ucfirst($donation->status) }}
                                                </span>

                                                @if ($donation->is_transferred)
                                                    <span
                                                        class="inline-flex items-center px-1.5 md:px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-blue-100 text-blue-800"
                                                        title="Transferred to Committee">
                                                        Transferred
                                                    </span>
                                                @endif

                                                @if ($donation->sms_sent)
                                                    <div
                                                        class="group relative flex items-center justify-center cursor-help">
                                                        <div
                                                            class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
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
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs text-gray-600">
                                            <div>
                                                <p class="text-[10px] md:text-xs">
                                                    {{ $donation->created_at->format('M d, Y') }}</p>
                                                <p class="text-[10px] text-gray-400">
                                                    {{ $donation->created_at->format('h:i A') }}</p>
                                            </div>
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <div class="flex items-center space-x-2 md:space-x-3">
                                                <a href="{{ route('admin.registrations.show', $donation) }}"
                                                    class="text-blue-600 hover:text-blue-700 font-medium text-[10px] md:text-xs">
                                                    View
                                                </a>
                                                @if ($donation->status === 'pending')
                                                    <form action="{{ route('admin.registrations.verify', $donation) }}"
                                                        method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-green-600 hover:text-green-700 font-medium text-[10px] md:text-xs">
                                                            Verify
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($donation->status === 'verified' && !$donation->is_transferred)
                                                    <form action="{{ route('admin.registrations.transfer', $donation) }}"
                                                        method="POST" class="inline"
                                                        onsubmit="return confirm('Are you sure you want to mark this donation as transferred to the committee?');">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-purple-600 hover:text-purple-700 font-medium text-[10px] md:text-xs">
                                                            Transfer
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-4 md:mt-6 px-4 md:px-0">
                    {{ $donations->links() }}
                </div>
            @else
                <div class="text-center py-12 md:py-16 px-6">
                    <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-300 mx-auto mb-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <p class="text-gray-500 text-sm md:text-base">No registrations found</p>
                </div>
            @endif
        </div>
    </div>
@endsection
