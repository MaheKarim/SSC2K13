@extends('layouts.admin')

@section('page-title', 'Registration Details')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.registrations.index') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                ← Back to Registrations
            </a>
        </div>

        <div class="card">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $donation->name }}</h3>
                    <p class="text-gray-600">{{ $donation->phone }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    @if ($donation->status === 'verified') bg-green-100 text-green-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($donation->status) }}
                    </span>

                    @if ($donation->sms_sent)
                        <div class="group relative flex items-center justify-center cursor-help">
                            <div
                                class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                SMS Sent
                            </div>

                            <!-- Tooltip -->
                            <div
                                class="absolute top-full right-0 mt-2 hidden group-hover:block w-72 p-3 bg-gray-900 text-white text-xs rounded-lg shadow-xl z-20 whitespace-normal text-left">
                                <span class="block font-semibold mb-1 text-sm">SMS Delivery Details</span>
                                <span
                                    class="text-gray-300 font-mono">{{ $donation->sms_response ? strip_tags(str_replace('"', '', $donation->sms_response)) : 'Success' }}</span>
                                <div class="absolute bottom-full right-8 border-4 border-transparent border-b-gray-900">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Donation Info -->
                <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">Registration Information</h4>

                    <div>
                        <p class="text-sm text-gray-500">Registration For</p>
                        @if ($donation->type === 'sponsor')
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 mt-1">
                                Sponsor
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-1">
                                Participant
                            </span>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Registration Type</p>
                        <p class="font-medium text-gray-800">{{ $donation->donation_type_label }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Amount</p>
                        <p class="font-medium text-gray-800 text-xl">৳{{ number_format($donation->amount, 2) }}</p>
                    </div>

                    @if ($donation->collect_by)
                        <div>
                            <p class="text-sm text-gray-500">Collected By</p>
                            <p class="font-medium text-gray-800">{{ $donation->collect_by }}</p>
                        </div>
                    @endif

                    <div>
                        <p class="text-sm text-gray-500">Transaction ID</p>
                        <p class="font-medium text-gray-800 font-mono">{{ $donation->transaction_id ?? 'N/A' }}</p>
                    </div>

                    @if ($donation->screenshot)
                        <div>
                            <p class="text-sm text-gray-500">Payment Screenshot</p>
                            <a href="{{ asset('storage/' . $donation->screenshot) }}" target="_blank"
                                class="inline-block mt-1">
                                <img src="{{ asset('storage/' . $donation->screenshot) }}" alt="Payment Screenshot"
                                    class="h-32 rounded-lg border border-gray-200 hover:shadow-md transition cursor-pointer">
                            </a>
                        </div>
                    @endif

                    <div>
                        <p class="text-sm text-gray-500">Submitted At</p>
                        <p class="font-medium text-gray-800">{{ $donation->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">Payment Information</h4>

                    <div>
                        <p class="text-sm text-gray-500">Sent From</p>
                        <p class="font-medium text-gray-800">{{ $donation->sent_from }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Sent To</p>
                        <p class="font-medium text-gray-800">{{ $donation->sentToPhone?->number ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-500">{{ $donation->sentToPhone?->operator ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Jersey Details -->
            @if ($donation->jerseyDetail)
                <div class="mt-6 pt-6 border-t">
                    <h4 class="font-semibold text-gray-700 mb-4">Jersey Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Size</p>
                            <p class="font-medium text-gray-800">{{ $donation->jerseyDetail->size?->size ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Name on Jersey</p>
                            <p class="font-medium text-gray-800">{{ $donation->jerseyDetail->name_on_jersey }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Number on Jersey</p>
                            <p class="font-medium text-gray-800">{{ $donation->jerseyDetail->number_on_jersey }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="mt-6 pt-6 border-t flex justify-end space-x-3">
                @if ($donation->status === 'pending')
                    <form action="{{ route('admin.registrations.verify', $donation) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-primary">
                            Verify Registration
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
