@extends('layouts.admin')

@section('page-title', 'Registration Details')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-4 md:mb-6">
            <a href="{{ route('admin.registrations.index') }}"
                class="text-primary-600 hover:text-primary-700 font-medium text-sm md:text-base inline-flex items-center">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Registrations
            </a>
        </div>

        <div class="card overflow-hidden">
            <div class="flex flex-col sm:flex-row justify-between items-start gap-3 md:gap-4 mb-4 md:mb-6 p-4 md:p-6 pb-0">
                <div class="min-w-0">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 truncate">{{ $donation->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $donation->phone }}</p>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3 flex-wrap gap-y-2">
                    <span
                        class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-full text-xs md:text-sm font-medium
                    @if ($donation->status === 'verified') bg-green-100 text-green-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($donation->status) }}
                    </span>

                    @if ($donation->sms_sent)
                        <div class="group relative flex items-center justify-center cursor-help">
                            <div
                                class="px-2.5 md:px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs md:text-sm font-medium flex items-center">
                                <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="hidden sm:inline">SMS Sent</span>
                                <span class="sm:hidden">SMS</span>
                            </div>

                            <!-- Tooltip -->
                            <div
                                class="absolute top-full right-0 mt-2 hidden group-hover:block w-64 md:w-72 p-2 md:p-3 bg-gray-900 text-white text-xs rounded-lg shadow-xl z-20 whitespace-normal text-left">
                                <span class="block font-semibold mb-1 text-sm">SMS Delivery Details</span>
                                <span
                                    class="text-gray-300 font-mono text-xs">{{ $donation->sms_response ? strip_tags(str_replace('"', '', $donation->sms_response)) : 'Success' }}</span>
                                <div class="absolute bottom-full right-8 border-4 border-transparent border-b-gray-900">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 px-4 md:px-6">
                <!-- Donation Info -->
                <div class="space-y-3 md:space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2 text-sm md:text-base">Registration Information</h4>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Registration For</p>
                        @if ($donation->type === 'sponsor')
                            <span
                                class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-full text-[10px] md:text-xs font-medium bg-amber-100 text-amber-800 mt-1">
                                Sponsor
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-2 md:px-2.5 py-0.5 md:py-1 rounded-full text-[10px] md:text-xs font-medium bg-gray-100 text-gray-800 mt-1">
                                Participant
                            </span>
                        @endif
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Registration Type</p>
                        <p class="font-medium text-gray-800 text-sm md:text-base">{{ $donation->donation_type_label }}</p>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Amount</p>
                        <p class="font-medium text-gray-800 text-lg md:text-xl">৳{{ number_format($donation->amount, 2) }}
                        </p>
                    </div>

                    @if ($donation->collect_by)
                        <div>
                            <p class="text-xs md:text-sm text-gray-500">Collected By</p>
                            <p class="font-medium text-gray-800 text-sm md:text-base">{{ $donation->collect_by }}</p>
                        </div>
                    @endif

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Transaction ID</p>
                        <p class="font-medium text-gray-800 font-mono text-sm md:text-base break-all">
                            {{ $donation->transaction_id ?? 'N/A' }}</p>
                    </div>

                    @if ($donation->screenshot)
                        <div>
                            <p class="text-xs md:text-sm text-gray-500 mb-2">Payment Screenshot</p>
                            <a href="{{ asset('storage/' . $donation->screenshot) }}" target="_blank" class="inline-block">
                                <img src="{{ asset('storage/' . $donation->screenshot) }}" alt="Payment Screenshot"
                                    class="h-24 md:h-32 rounded-lg border border-gray-200 hover:shadow-md transition cursor-pointer">
                            </a>
                        </div>
                    @endif

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Submitted At</p>
                        <p class="font-medium text-gray-800 text-sm md:text-base">
                            {{ $donation->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="space-y-3 md:space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2 text-sm md:text-base">Payment Information</h4>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Sent From</p>
                        <p class="font-medium text-gray-800 text-sm md:text-base">{{ $donation->sent_from }}</p>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500">Sent To</p>
                        <p class="font-medium text-gray-800 text-sm md:text-base">
                            {{ $donation->sentToPhone?->number ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-500">{{ $donation->sentToPhone?->operator ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Jersey Details -->
            @if ($donation->jerseyDetail)
                <div class="mt-4 md:mt-6 pt-4 md:pt-6 border-t mx-4 md:mx-6">
                    <h4 class="font-semibold text-gray-700 mb-3 md:mb-4 text-sm md:text-base">Jersey Details</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
                        <div>
                            <p class="text-xs md:text-sm text-gray-500">Size</p>
                            <p class="font-medium text-gray-800 text-sm md:text-base">
                                {{ $donation->jerseyDetail->size?->size ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-xs md:text-sm text-gray-500">Name on Jersey</p>
                            <p class="font-medium text-gray-800 text-sm md:text-base">
                                {{ $donation->jerseyDetail->name_on_jersey }}</p>
                        </div>
                        <div>
                            <p class="text-xs md:text-sm text-gray-500">Number on Jersey</p>
                            <p class="font-medium text-gray-800 text-sm md:text-base">
                                {{ $donation->jerseyDetail->number_on_jersey }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="mt-4 md:mt-6 pt-4 md:pt-6 border-t flex justify-end space-x-2 md:space-x-3 p-4 md:p-6 pt-0">
                @if ($donation->status === 'pending')
                    <form action="{{ route('admin.registrations.verify', $donation) }}" method="POST"
                        class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="mobile-btn btn-primary w-full">
                            Verify Registration
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
