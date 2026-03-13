@extends('layouts.admin')

@section('page-title', 'Site Settings')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="card p-4 md:p-6">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-4 md:mb-6">Hero Section Settings</h3>

            <form action="{{ route('admin.site-settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4 md:space-y-6">
                    {{-- Iftar Date --}}
                    <div>
                        <label for="iftar_date" class="label text-xs md:text-sm">Iftar Date</label>
                        <input type="date" id="iftar_date" name="iftar_date" value="{{ old('iftar_date', $iftarDate) }}"
                            class="input-field text-sm @error('iftar_date') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">
                            This date will be shown as a countdown timer in the hero section.
                            Leave empty to hide the countdown.
                        </p>
                        @error('iftar_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Registration Deadline --}}
                    <div>
                        <label for="registration_deadline" class="label text-xs md:text-sm">Registration Deadline</label>
                        <input type="datetime-local" id="registration_deadline" name="registration_deadline"
                            value="{{ old('registration_deadline', $registrationDeadline) }}"
                            class="input-field text-sm @error('registration_deadline') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">
                            Set a deadline for registrations. The registration form will close after this date and time.
                            Leave empty for no deadline.
                        </p>
                        @error('registration_deadline')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="mobile-btn btn-primary w-full sm:w-auto">
                        Save Settings
                    </button>

                    {{-- Registration Form Toggles --}}
                    <div class="pt-4 md:pt-6 border-t border-gray-100">
                        <h4 class="text-sm md:text-base font-semibold text-gray-700 mb-4">Registration Form Options</h4>
                        <div class="space-y-4">
                            {{-- Iftar Toggle --}}
                            <label class="flex items-center justify-between gap-4 p-4 rounded-xl border border-gray-100 bg-gray-50 cursor-pointer group hover:border-primary-200 transition-colors">
                                <div>
                                    <p class="font-medium text-gray-800 text-sm">🌙 ইফতার ফর্ম সক্রিয়</p>
                                    <p class="text-xs text-gray-500 mt-0.5">বন্ধ করলে পাবলিক ফর্মে ইফতার অপশন দেখা যাবে না</p>
                                </div>
                                <div class="relative shrink-0">
                                    <input type="checkbox" name="iftar_form_enabled" id="iftar_form_enabled" class="sr-only peer" value="1"
                                        {{ $iftarFormEnabled === '1' ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-primary-600 transition-colors duration-200"></div>
                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                                </div>
                            </label>

                            {{-- Jersey Toggle --}}
                            <label class="flex items-center justify-between gap-4 p-4 rounded-xl border border-gray-100 bg-gray-50 cursor-pointer group hover:border-primary-200 transition-colors">
                                <div>
                                    <p class="font-medium text-gray-800 text-sm">👕 জার্সি ফর্ম সক্রিয়</p>
                                    <p class="text-xs text-gray-500 mt-0.5">বন্ধ করলে পাবলিক ফর্মে জার্সি অপশন দেখা যাবে না</p>
                                </div>
                                <div class="relative shrink-0">
                                    <input type="checkbox" name="jersey_form_enabled" id="jersey_form_enabled" class="sr-only peer" value="1"
                                        {{ $jerseyFormEnabled === '1' ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-primary-600 transition-colors duration-200"></div>
                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                                </div>
                            </label>
                        </div>
                        <p class="text-xs text-gray-400 mt-3">উভয় বন্ধ থাকলে পুরো রেজিস্ট্রেশন ফর্ম লুকিয়ে যাবে।</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
