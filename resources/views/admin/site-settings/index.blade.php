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
                </div>
            </form>
        </div>
    </div>
@endsection
