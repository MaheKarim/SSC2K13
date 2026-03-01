@extends('layouts.admin')

@section('page-title', 'Add Manual Registration')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-4 md:mb-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-gray-800">Add Manual Registration</h1>
                    <p class="text-gray-600 mt-1 text-sm">Manually add a registration entry</p>
                </div>
                <a href="{{ route('admin.registrations.index') }}"
                    class="text-gray-600 hover:text-gray-800 flex items-center text-sm md:text-base">
                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Registrations
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <form action="{{ route('admin.registrations.store') }}" method="POST" class="p-4 md:p-6">
                @csrf

                <!-- Personal Information -->
                <div class="mb-6 md:mb-8">
                    <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4 pb-2 border-b border-gray-100">
                        Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div>
                            <label for="name" class="label text-xs md:text-sm">Full Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="input-field text-sm @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="label text-xs md:text-sm">Phone Number <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                class="input-field text-sm @error('phone') border-red-500 @enderror"
                                placeholder="01XXXXXXXXX" required>
                            @error('phone')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Registration Type & Amount -->
                <div class="mb-6 md:mb-8">
                    <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4 pb-2 border-b border-gray-100">
                        Registration Details
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4 mb-3 md:mb-4">
                        <div>
                            <label for="type" class="label text-xs md:text-sm">Registration Role <span
                                    class="text-red-500">*</span></label>
                            <select id="type" name="type"
                                class="input-field text-sm @error('type') border-red-500 @enderror" required>
                                <option value="participant" {{ old('type') == 'participant' ? 'selected' : '' }}>Participant
                                </option>
                                <option value="sponsor" {{ old('type') == 'sponsor' ? 'selected' : '' }}>Sponsor</option>
                            </select>
                            @error('type')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="donation_type" class="label text-xs md:text-sm">Registration Type <span
                                    class="text-red-500">*</span></label>
                            <select id="donation_type" name="donation_type"
                                class="input-field text-sm @error('donation_type') border-red-500 @enderror" required
                                onchange="updateAmount()">
                                <option value="">Select Registration Type</option>
                                <option value="iftar" {{ old('donation_type') == 'iftar' ? 'selected' : '' }}>Iftar
                                </option>
                                <option value="jersey" {{ old('donation_type') == 'jersey' ? 'selected' : '' }}>Jersey
                                </option>
                                <option value="both" {{ old('donation_type') == 'both' ? 'selected' : '' }}>Full Package
                                    (Iftar + Jersey)</option>
                            </select>
                            @error('donation_type')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="amount" class="label text-xs md:text-sm">Registration Amount (৳) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" id="amount" name="amount" value="{{ old('amount') }}"
                                class="input-field text-sm @error('amount') border-red-500 @enderror"
                                placeholder="Enter amount" required>
                            @error('amount')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Jersey Details (Conditional) -->
                    <div id="jerseySection" class="hidden bg-gray-50 rounded-lg p-3 md:p-4 mt-3 md:mt-4">
                        <h4 class="font-medium text-gray-700 mb-2 md:mb-3 text-sm">Jersey Details</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
                            <div>
                                <label for="size_id" class="label text-xs md:text-sm">Jersey Size <span
                                        class="text-red-500">*</span></label>
                                <select id="size_id" name="size_id"
                                    class="input-field text-sm @error('size_id') border-red-500 @enderror">
                                    <option value="">Select Size</option>
                                    @foreach (\App\Models\JerseySize::where('active', true)->get() as $size)
                                        <option value="{{ $size->id }}"
                                            {{ old('size_id') == $size->id ? 'selected' : '' }}>{{ $size->size }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('size_id')
                                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="name_on_jersey" class="label text-xs md:text-sm">Name on Jersey <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="name_on_jersey" name="name_on_jersey"
                                    value="{{ old('name_on_jersey') }}"
                                    class="input-field text-sm @error('name_on_jersey') border-red-500 @enderror"
                                    maxlength="15">
                                @error('name_on_jersey')
                                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="number_on_jersey" class="label text-xs md:text-sm">Number on Jersey <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="number_on_jersey" name="number_on_jersey"
                                    value="{{ old('number_on_jersey') }}"
                                    class="input-field text-sm @error('number_on_jersey') border-red-500 @enderror"
                                    maxlength="5">
                                @error('number_on_jersey')
                                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Collection Information -->
                <div class="mb-6 md:mb-8">
                    <h3
                        class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4 pb-2 border-b border-gray-100">
                        Collection
                        Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div>
                            <label for="collect_by" class="label text-xs md:text-sm">Collected By <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="collect_by" name="collect_by" value="{{ old('collect_by') }}"
                                class="input-field text-sm @error('collect_by') border-red-500 @enderror"
                                placeholder="Name of collector" required>
                            @error('collect_by')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="label text-xs md:text-sm">Status <span
                                    class="text-red-500">*</span></label>
                            <select id="status" name="status"
                                class="input-field text-sm @error('status') border-red-500 @enderror" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="verified" {{ old('status') == 'verified' ? 'selected' : '' }}>Verified
                                </option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Information (Optional) -->
                <div class="mb-6 md:mb-8">
                    <h3
                        class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4 pb-2 border-b border-gray-100">
                        Payment Information
                        (Optional)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                        <div>
                            <label for="sent_from" class="label text-xs md:text-sm">Sent From Number</label>
                            <input type="text" id="sent_from" name="sent_from" value="{{ old('sent_from') }}"
                                class="input-field text-sm @error('sent_from') border-red-500 @enderror"
                                placeholder="01XXXXXXXXX">
                            @error('sent_from')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sent_to_phone_id" class="label text-xs md:text-sm">Sent To (Phone Number)</label>
                            <select id="sent_to_phone_id" name="sent_to_phone_id"
                                class="input-field text-sm @error('sent_to_phone_id') border-red-500 @enderror">
                                <option value="">Select Phone Number</option>
                                @foreach (\App\Models\PhoneNumber::where('active', true)->get() as $phone)
                                    <option value="{{ $phone->id }}"
                                        {{ old('sent_to_phone_id') == $phone->id ? 'selected' : '' }}>
                                        {{ $phone->number }} ({{ $phone->operator }})
                                    </option>
                                @endforeach
                            </select>
                            @error('sent_to_phone_id')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="transaction_id" class="label text-xs md:text-sm">Transaction ID</label>
                            <input type="text" id="transaction_id" name="transaction_id"
                                value="{{ old('transaction_id') }}"
                                class="input-field text-sm @error('transaction_id') border-red-500 @enderror">
                            @error('transaction_id')
                                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-2 md:gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.registrations.index') }}"
                        class="mobile-btn px-4 md:px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors text-center text-sm">
                        Cancel
                    </a>
                    <button type="submit" class="mobile-btn btn-primary flex items-center justify-center">
                        <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Manual Registration
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateAmount() {
            const type = document.getElementById('donation_type').value;
            const amountField = document.getElementById('amount');
            const jerseySection = document.getElementById('jerseySection');

            // Default suggested amounts (admin can change)
            const amounts = {
                'iftar': 250,
                'jersey': 250,
                'both': 500
            };

            // Only set default if amount field is empty
            if (type && amounts[type] && !amountField.value) {
                amountField.value = amounts[type];
            }

            // Show/hide jersey section
            if (type === 'jersey' || type === 'both') {
                jerseySection.classList.remove('hidden');
                document.getElementById('size_id').setAttribute('required', 'required');
                document.getElementById('name_on_jersey').setAttribute('required', 'required');
                document.getElementById('number_on_jersey').setAttribute('required', 'required');
            } else {
                jerseySection.classList.add('hidden');
                document.getElementById('size_id').removeAttribute('required');
                document.getElementById('name_on_jersey').removeAttribute('required');
                document.getElementById('number_on_jersey').removeAttribute('required');
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateAmount();
        });
    </script>
@endsection
