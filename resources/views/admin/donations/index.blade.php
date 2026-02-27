@extends('layouts.admin')

@section('page-title', 'Registrations')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Registrations</h1>
            <a href="{{ route('admin.registrations.create') }}" class="btn-primary flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Add Manual
            </a>
        </div>

        <!-- Filters and Export -->
        <div class="card">
            <form action="{{ route('admin.registrations.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-48">
                    <label class="label">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" class="input-field"
                        placeholder="Name, Phone, Transaction ID">
                </div>
                <div class="w-48">
                    <label class="label">Type</label>
                    <select name="type" class="input-field">
                        <option value="">All Types</option>
                        <option value="iftar" {{ request('type') === 'iftar' ? 'selected' : '' }}>Iftar Mahfil</option>
                        <option value="jersey" {{ request('type') === 'jersey' ? 'selected' : '' }}>Jersey</option>
                        <option value="both" {{ request('type') === 'both' ? 'selected' : '' }}>Both</option>
                    </select>
                </div>
                <div class="w-48">
                    <label class="label">Status</label>
                    <select name="status" class="input-field">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Verified</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Filter</button>
                    <a href="{{ route('admin.registrations.export', request()->query()) }}" target="_blank"
                        class="btn-gold flex items-center">
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
        <div class="card">
            @if ($donations->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Name</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Reg. For</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Reg. Type</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Amount</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Collected By</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Jersey Details</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Status</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Date</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $donation)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm">
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $donation->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $donation->phone }}</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if ($donation->type === 'sponsor') bg-amber-100 text-amber-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($donation->type ?? 'Participant') }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if ($donation->donation_type === 'iftar') bg-green-100 text-green-800
                                        @elseif($donation->donation_type === 'jersey') bg-blue-100 text-blue-800
                                        @else bg-purple-100 text-purple-800 @endif">
                                            {{ $donation->donation_type_label }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-sm font-semibold text-gray-800">
                                        ৳{{ number_format($donation->amount, 2) }}
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        @if ($donation->collect_by)
                                            <span class="text-xs text-gray-600">{{ $donation->collect_by }}</span>
                                        @else
                                            <span class="text-xs text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        @if ($donation->jerseyDetail)
                                            <div>
                                                <p class="text-xs text-gray-800">Size:
                                                    {{ $donation->jerseyDetail->size?->size ?? 'N/A' }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $donation->jerseyDetail->name_on_jersey }} -
                                                    {{ $donation->jerseyDetail->number_on_jersey }}</p>
                                            </div>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if ($donation->status === 'verified') bg-green-100 text-green-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($donation->status) }}
                                            </span>

                                            @if ($donation->sms_sent)
                                                <div class="group relative flex items-center justify-center cursor-help">
                                                    <div
                                                        class="w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
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
                                    <td class="py-3 px-4 text-sm text-gray-600">
                                        <div>
                                            <p>{{ $donation->created_at->format('M d, Y') }}</p>
                                            <p class="text-xs text-gray-400">{{ $donation->created_at->format('h:i A') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.registrations.show', $donation) }}"
                                                class="text-blue-600 hover:text-blue-700 font-medium">
                                                View
                                            </a>
                                            @if ($donation->status === 'pending')
                                                <form action="{{ route('admin.registrations.verify', $donation) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="text-green-600 hover:text-green-700 font-medium">
                                                        Verify
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

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $donations->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <p class="text-gray-500">No registrations found</p>
                </div>
            @endif
        </div>
    </div>
@endsection
