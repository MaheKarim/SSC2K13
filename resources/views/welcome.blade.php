<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSC-2013 Batch - Iftar & Jersey Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <!-- Admin Dashboard Quick Access -->
    @if (Auth::guard('admin')->check())
        <a href="{{ route('admin.dashboard') }}"
            class="fixed top-4 right-4 z-50 inline-flex items-center gap-2 px-3 py-2 md:px-4 md:py-2.5 bg-white/95 backdrop-blur-sm text-gray-800 text-sm font-semibold rounded-full shadow-lg hover:shadow-xl border border-gray-200/80 hover:bg-white transition-all duration-300 group">
            <svg class="w-4 h-4 md:w-5 md:h-5 text-primary-600 group-hover:text-primary-700 transition-colors"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="hidden sm:inline">Dashboard</span>
        </a>
    @endif

    <!-- Hero Section -->
    <section class="hero-section text-white relative overflow-hidden min-h-[90vh] flex items-center">
        <!-- Animated Background Orbs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
            <div class="hero-orb hero-orb-3"></div>
            <div class="hero-orb hero-orb-4"></div>

            <!-- Twinkling Stars (small dots) -->
            <div class="hero-star" style="top: 15%; left: 20%; animation-delay: 0s;"></div>
            <div class="hero-star" style="top: 35%; left: 70%; animation-delay: 1.2s;"></div>
            <div class="hero-star" style="top: 60%; left: 40%; animation-delay: 2.4s;"></div>
            <div class="hero-star" style="top: 80%; left: 85%; animation-delay: 0.6s;"></div>
            <div class="hero-star" style="top: 25%; left: 90%; animation-delay: 1.8s;"></div>
            <div class="hero-star" style="top: 70%; left: 15%; animation-delay: 3s;"></div>
            <div class="hero-star" style="top: 10%; left: 55%; animation-delay: 0.3s;"></div>
            <div class="hero-star" style="top: 45%; left: 10%; animation-delay: 2s;"></div>
            <div class="hero-star" style="top: 55%; left: 82%; animation-delay: 1.5s;"></div>

            <!-- Floating Crescent Moons (SVG) -->
            <svg class="islamic-crescent islamic-crescent-1" viewBox="0 0 64 64" fill="none">
                <path
                    d="M40 8C28.954 8 20 16.954 20 28s8.954 20 20 20c4.374 0 8.438-1.405 11.74-3.787C47.622 49.003 41.04 52 33.778 52 20.58 52 10 41.42 10 28.222S20.58 4.444 33.778 4.444c7.262 0 13.844 2.997 17.962 7.769A19.89 19.89 0 0040 8z"
                    fill="currentColor" />
            </svg>
            <svg class="islamic-crescent islamic-crescent-2" viewBox="0 0 64 64" fill="none">
                <path
                    d="M40 8C28.954 8 20 16.954 20 28s8.954 20 20 20c4.374 0 8.438-1.405 11.74-3.787C47.622 49.003 41.04 52 33.778 52 20.58 52 10 41.42 10 28.222S20.58 4.444 33.778 4.444c7.262 0 13.844 2.997 17.962 7.769A19.89 19.89 0 0040 8z"
                    fill="currentColor" />
            </svg>
            <svg class="islamic-crescent islamic-crescent-3" viewBox="0 0 64 64" fill="none">
                <path
                    d="M40 8C28.954 8 20 16.954 20 28s8.954 20 20 20c4.374 0 8.438-1.405 11.74-3.787C47.622 49.003 41.04 52 33.778 52 20.58 52 10 41.42 10 28.222S20.58 4.444 33.778 4.444c7.262 0 13.844 2.997 17.962 7.769A19.89 19.89 0 0040 8z"
                    fill="currentColor" />
            </svg>

            <!-- Floating Islamic Stars (5-pointed) -->
            <svg class="islamic-star islamic-star-1" viewBox="0 0 40 40" fill="none">
                <path d="M20 2l4.9 10.5L36 14.3l-8 7.5 2 11.2L20 27.5 9.9 33l2-11.2-8-7.5 11.1-1.8z"
                    fill="currentColor" />
            </svg>
            <svg class="islamic-star islamic-star-2" viewBox="0 0 40 40" fill="none">
                <path d="M20 2l4.9 10.5L36 14.3l-8 7.5 2 11.2L20 27.5 9.9 33l2-11.2-8-7.5 11.1-1.8z"
                    fill="currentColor" />
            </svg>
            <svg class="islamic-star islamic-star-3" viewBox="0 0 40 40" fill="none">
                <path d="M20 2l4.9 10.5L36 14.3l-8 7.5 2 11.2L20 27.5 9.9 33l2-11.2-8-7.5 11.1-1.8z"
                    fill="currentColor" />
            </svg>
            <svg class="islamic-star islamic-star-4" viewBox="0 0 40 40" fill="none">
                <path d="M20 2l4.9 10.5L36 14.3l-8 7.5 2 11.2L20 27.5 9.9 33l2-11.2-8-7.5 11.1-1.8z"
                    fill="currentColor" />
            </svg>

            <!-- Mosque Dome Silhouette (bottom-right) -->
            <svg class="islamic-mosque" viewBox="0 0 200 120" fill="none">
                <path d="M100 10 C100 10, 60 50, 60 80 L60 120 L140 120 L140 80 C140 50, 100 10, 100 10Z"
                    fill="currentColor" opacity="0.5" />
                <rect x="95" y="0" width="10" height="20" rx="5" fill="currentColor" opacity="0.6" />
                <path d="M97 0 L100 -8 L103 0" fill="currentColor" opacity="0.6" />
                <!-- Minaret left -->
                <rect x="45" y="50" width="8" height="70" fill="currentColor" opacity="0.4" />
                <path d="M44 50 L49 35 L54 50" fill="currentColor" opacity="0.4" />
                <!-- Minaret right -->
                <rect x="147" y="50" width="8" height="70" fill="currentColor" opacity="0.4" />
                <path d="M146 50 L151 35 L156 50" fill="currentColor" opacity="0.4" />
            </svg>

            <!-- Lantern decorations -->
            <svg class="islamic-lantern islamic-lantern-1" viewBox="0 0 32 48" fill="none">
                <rect x="13" y="0" width="6" height="6" rx="1" fill="currentColor" opacity="0.7" />
                <path d="M10 6 L22 6 L20 14 Q16 18 12 14 Z" fill="currentColor" opacity="0.6" />
                <rect x="10" y="14" width="12" height="20" rx="2" fill="currentColor"
                    opacity="0.4" />
                <rect x="12" y="16" width="8" height="6" rx="1" fill="currentColor"
                    opacity="0.15" />
                <rect x="12" y="24" width="8" height="6" rx="1" fill="currentColor"
                    opacity="0.15" />
                <path d="M10 34 L22 34 L20 40 Q16 44 12 40 Z" fill="currentColor" opacity="0.5" />
            </svg>
            <svg class="islamic-lantern islamic-lantern-2" viewBox="0 0 32 48" fill="none">
                <rect x="13" y="0" width="6" height="6" rx="1" fill="currentColor"
                    opacity="0.7" />
                <path d="M10 6 L22 6 L20 14 Q16 18 12 14 Z" fill="currentColor" opacity="0.6" />
                <rect x="10" y="14" width="12" height="20" rx="2" fill="currentColor"
                    opacity="0.4" />
                <rect x="12" y="16" width="8" height="6" rx="1" fill="currentColor"
                    opacity="0.15" />
                <rect x="12" y="24" width="8" height="6" rx="1" fill="currentColor"
                    opacity="0.15" />
                <path d="M10 34 L22 34 L20 40 Q16 44 12 40 Z" fill="currentColor" opacity="0.5" />
            </svg>
        </div>

        <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <!-- Badge with glow -->
                <div class="hero-animate inline-flex items-center glass-badge px-5 py-2.5 rounded-full text-sm mb-8 cursor-default"
                    style="animation-delay: 0.1s;">
                    <svg class="w-4 h-4 mr-2 text-gold-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    <span class="font-medium">Government Islampur Nekjahan Pilot Model High School</span>
                </div>

                <!-- Main Title with gradient text -->
                <h1 class="hero-animate text-5xl md:text-7xl lg:text-8xl font-extrabold mb-4 leading-tight"
                    style="animation-delay: 0.25s;">
                    <span class="hero-title-gradient">SSC-2013</span>
                    <span class="block text-white/90 text-3xl md:text-5xl lg:text-6xl font-bold mt-2">Batch
                        Reunion</span>
                </h1>

                <p class="hero-animate text-xl md:text-2xl text-white/70 mb-6 font-light tracking-wide"
                    style="animation-delay: 0.4s;">
                    Iftar Mahfil & Jersey Registration 2025
                </p>

                <p class="hero-animate text-base md:text-lg text-white/50 max-w-2xl mx-auto mb-12"
                    style="animation-delay: 0.5s;">
                    Join us in making this Ramadan special! Contribute to our batch Iftar Mahfil and get your custom
                    jersey.
                </p>

                <!-- Info Cards Row: Countdown + Participants + Deadline -->
                <div class="hero-animate grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-12"
                    style="animation-delay: 0.6s;">
                    <!-- Iftar Countdown Card -->
                    <div class="glass-card p-6 rounded-2xl">
                        <div class="flex items-center justify-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <h3 class="text-sm font-semibold text-white/80 uppercase tracking-wider">Iftar Date</h3>
                        </div>
                        @if ($iftarDate)
                            <p class="text-gold-400 font-bold text-lg mb-4">
                                {{ \Carbon\Carbon::parse($iftarDate)->format('d F, Y') }}</p>
                            <div id="countdown" class="grid grid-cols-4 gap-3">
                                <div class="countdown-unit">
                                    <span id="countdown-days"
                                        class="text-2xl md:text-3xl font-bold text-white">--</span>
                                    <span class="text-[10px] uppercase tracking-widest text-white/50 mt-1">Days</span>
                                </div>
                                <div class="countdown-unit">
                                    <span id="countdown-hours"
                                        class="text-2xl md:text-3xl font-bold text-white">--</span>
                                    <span class="text-[10px] uppercase tracking-widest text-white/50 mt-1">Hours</span>
                                </div>
                                <div class="countdown-unit">
                                    <span id="countdown-minutes"
                                        class="text-2xl md:text-3xl font-bold text-white">--</span>
                                    <span class="text-[10px] uppercase tracking-widest text-white/50 mt-1">Mins</span>
                                </div>
                                <div class="countdown-unit">
                                    <span id="countdown-seconds"
                                        class="text-2xl md:text-3xl font-bold text-white">--</span>
                                    <span class="text-[10px] uppercase tracking-widest text-white/50 mt-1">Secs</span>
                                </div>
                            </div>
                        @else
                            <p class="text-white/40 text-lg italic">Date to be announced</p>
                        @endif
                    </div>

                    <!-- Verified Participants Card -->
                    <div class="glass-card p-6 rounded-2xl">
                        <div class="flex items-center justify-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <h3 class="text-sm font-semibold text-white/80 uppercase tracking-wider">Verified
                                Participants</h3>
                        </div>
                        <div class="flex items-center justify-center gap-3">
                            <span id="participant-count"
                                class="text-5xl md:text-6xl font-extrabold hero-title-gradient"
                                data-target="{{ $verifiedParticipants }}">0</span>
                            <span class="text-white/50 text-sm">people<br>joined</span>
                        </div>
                        @if ($verifiedParticipants > 0)
                            <div class="flex items-center justify-center gap-1.5 mt-4">
                                <span class="participant-pulse"></span>
                                <span class="text-xs text-green-400 font-medium">Verified & Confirmed</span>
                            </div>
                        @endif
                    </div>

                    <!-- Registration Deadline Card -->
                    @php
                        $isUrgent = false;
                        if ($registrationDeadline) {
                            $deadlineDate = \Carbon\Carbon::parse($registrationDeadline);
                            $isUrgent = now()->diffInDays($deadlineDate, false) <= 3 && now()->lessThan($deadlineDate);
                        }
                    @endphp
                    <div class="glass-card p-6 rounded-2xl relative overflow-hidden group">
                        @if ($isUrgent)
                            <!-- Urgent warning glow -->
                            <div
                                class="absolute inset-0 bg-red-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-orange-500">
                            </div>
                        @endif

                        <div class="flex items-center justify-center gap-2 mb-4">
                            <svg class="w-5 h-5 {{ $isUrgent ? 'text-red-400' : 'text-primary-400' }}" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <h3
                                class="text-sm font-semibold {{ $isUrgent ? 'text-red-100' : 'text-white/80' }} uppercase tracking-wider">
                                Registration Ends</h3>
                        </div>

                        @if ($registrationDeadline)
                            @if (\Carbon\Carbon::parse($registrationDeadline)->isPast())
                                <p class="text-red-400 font-bold text-2xl mb-1">Closed</p>
                                <p class="text-white/40 text-sm">Registration has ended</p>
                            @else
                                <p class="text-white/90 font-bold text-2xl mb-1">
                                    {{ \Carbon\Carbon::parse($registrationDeadline)->format('d M') }}</p>
                                <p class="text-white/60 text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($registrationDeadline)->format('h:i A') }}</p>

                                <div class="mt-4 flex flex-col items-center">
                                    @if ($isUrgent)
                                        <div
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-500/20 border border-red-500/30">
                                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                            <span
                                                class="text-xs font-semibold text-red-300 uppercase tracking-widest">{{ now()->diffInDays(\Carbon\Carbon::parse($registrationDeadline)) }}
                                                Days Left!</span>
                                        </div>
                                    @else
                                        <span
                                            class="text-xs text-primary-300/80 uppercase tracking-widest font-medium">Don't
                                            miss out</span>
                                    @endif
                                </div>
                            @endif
                        @else
                            <div class="flex flex-col items-center justify-center h-full pt-2">
                                <p class="text-white/40 text-sm italic">Open until further notice</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Donation Cards -->
                <div class="hero-animate grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12"
                    style="animation-delay: 0.75s;">
                    <!-- Iftar Card -->
                    <div
                        class="glass-card rounded-2xl p-6 hover:border-gold-400/40 transition-all duration-300 cursor-default group">
                        <div
                            class="w-12 h-12 bg-gold-400/15 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-gold-400/25 transition-colors duration-300">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-white/90">Iftar Mahfil</h3>
                        <p class="text-3xl font-extrabold hero-title-gradient mb-2">৳250</p>
                        <p class="text-sm text-white/40">Join our batch Iftar gathering</p>
                    </div>

                    <!-- Jersey Card -->
                    <div
                        class="glass-card rounded-2xl p-6 hover:border-gold-400/40 transition-all duration-300 cursor-default group">
                        <div
                            class="w-12 h-12 bg-gold-400/15 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-gold-400/25 transition-colors duration-300">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-white/90">Batch Jersey</h3>
                        <p class="text-3xl font-extrabold hero-title-gradient mb-2">৳250</p>
                        <p class="text-sm text-white/40">Custom batch jersey with your name</p>
                    </div>

                    <!-- Both Card (highlighted) -->
                    <div class="glass-card-highlight rounded-2xl p-6 transition-all duration-300 cursor-default group">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                            <span
                                class="bg-gold-500 text-xs font-bold text-white px-3 py-1 rounded-full uppercase tracking-wider">Best
                                Value</span>
                        </div>
                        <div
                            class="w-12 h-12 bg-gold-400/25 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-gold-400/35 transition-colors duration-300">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-white">Complete Package</h3>
                        <p class="text-3xl font-extrabold hero-title-gradient mb-2">৳500</p>
                        <p class="text-sm text-white/50">Iftar + Jersey combined</p>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="hero-animate" style="animation-delay: 0.9s;">
                    <a href="#donate"
                        class="hero-cta-btn inline-flex items-center font-bold py-4 px-10 rounded-full text-lg transition-all duration-300 cursor-pointer">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Register Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="#f9fafb" />
            </svg>
        </div>
    </section>

    <!-- Payment Instructions -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">কিভাবে রেজিস্ট্রেশন করবেন</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div
                            class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary-600">1</span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">টাকা পাঠান</h3>
                        <p class="text-gray-600 text-sm">বিকাশ, নগদ, রকেট বা ব্যাংক ট্রান্সফারের মাধ্যমে আপনার
                            রেজিস্ট্রেশন ফি পাঠান</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div
                            class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary-600">2</span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">ফর্মটি পূরণ করুন</h3>
                        <p class="text-gray-600 text-sm">আপনার বিস্তারিত তথ্য এবং ট্রানজেকশন আইডি দিয়ে নিচের
                            রেজিস্ট্রেশন ফর্মটি পূরণ করুন</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div
                            class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary-600">3</span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">কনফার্মেশন</h3>
                        <p class="text-gray-600 text-sm">আমরা আপনার পেমেন্ট যাচাই করে রেজিস্ট্রেশন কনফার্ম করব</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Phone Numbers Section -->
    <section class="py-12 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-4">পেমেন্ট নম্বরসমূহ</h2>
                <p class="text-center text-gray-600 mb-8">নিচের নম্বরে টাকা পাঠাতে ক্লিক করে কপি করুন</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @php
                        $activePhones = $phoneNumbers->where('active', true);
                    @endphp
                    @forelse ($activePhones as $phone)
                        <div class="bg-white rounded-xl p-5 shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer group border-2 border-blue-200 hover:border-blue-400"
                            onclick="copyPhoneNumber('{{ $phone->number }}', this)">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-medium text-gray-500">{{ $phone->operator }}</span>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-xl font-bold text-gray-800 font-mono tracking-wide">{{ $phone->number }}
                            </div>
                            <div
                                class="copy-feedback hidden mt-2 text-sm text-green-600 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                কপি হয়েছে!
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">পেমেন্ট নম্বর শীঘ্রই যুক্ত করা হবে</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Form Section -->
    <section id="donate" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">রেজিস্ট্রেশন ফর্ম</h2>
                    <p class="text-center text-gray-600 mb-8">রেজিস্ট্রেশন সম্পন্ন করতে আপনার তথ্যগুলো দিন</p>

                    @if (session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    @php
                        $isClosed =
                            $registrationDeadline && now()->greaterThan(\Carbon\Carbon::parse($registrationDeadline));
                    @endphp

                    @if ($isClosed)
                        <div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                            <div
                                class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">রেজিস্ট্রেশন বন্ধ হয়ে গেছে</h3>
                            <p class="text-gray-600 max-w-md mx-auto">নির্ধারিত সময় পার হয়ে যাওয়ায় বর্তমানে নতুন
                                রেজিস্ট্রেশন গ্রহণ করা হচ্ছে না। যেকোনো প্রয়োজনে আয়োজকদের সাথে যোগাযোগ করুন।</p>
                        </div>
                    @else
                        <form action="{{ route('donation.submit') }}" method="POST" id="donationForm"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Personal Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    ব্যক্তিগত তথ্য
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label for="name" class="label">পুরো নাম <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="name" name="name"
                                            value="{{ old('name') }}"
                                            class="input-field @error('name') border-red-500 @enderror"
                                            placeholder="আপনার পুরো নাম লিখুন" required>
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone" class="label">মোবাইল নম্বর <span
                                                class="text-red-500">*</span></label>
                                        <input type="number" id="phone" name="phone"
                                            value="{{ old('phone') }}"
                                            class="input-field @error('phone') border-red-500 @enderror"
                                            placeholder="01XXXXXXXXX" required>
                                        @error('phone')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Donation Type Selection -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    অপশন নির্বাচন করুন
                                </h3>

                                <!-- Hidden input to store the selected donation type -->
                                <input type="hidden" name="donation_type" id="donationType"
                                    value="{{ old('donation_type', '') }}" required>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div class="donation-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 text-center transition duration-200 hover:shadow-md"
                                        data-type="iftar" data-amount="250" onclick="selectDonation(this)">
                                        <div class="text-2xl mb-2">🌙</div>
                                        <div class="font-semibold text-gray-800">শুধুমাত্র ইফতার</div>
                                        <div class="text-primary-600 font-bold">৳250</div>
                                        <div class="check-icon hidden mt-2">
                                            <svg class="w-6 h-6 mx-auto text-primary-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="donation-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 text-center transition duration-200 hover:shadow-md"
                                        data-type="jersey" data-amount="250" onclick="selectDonation(this)">
                                        <div class="text-2xl mb-2">👕</div>
                                        <div class="font-semibold text-gray-800">শুধুমাত্র জার্সি</div>
                                        <div class="text-primary-600 font-bold">৳250</div>
                                        <div class="check-icon hidden mt-2">
                                            <svg class="w-6 h-6 mx-auto text-primary-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="donation-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 text-center transition duration-200 hover:shadow-md"
                                        data-type="both" data-amount="500" onclick="selectDonation(this)">
                                        <div class="text-2xl mb-2">⭐</div>
                                        <div class="font-semibold text-gray-800">ইফতার + জার্সি</div>
                                        <div class="text-gold-600 font-bold">৳500</div>
                                        <div class="check-icon hidden mt-2">
                                            <svg class="w-6 h-6 mx-auto text-gold-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                @error('donation_type')
                                    <p class="text-red-500 text-sm mt-1 mb-2">{{ $message }}</p>
                                @enderror

                                <!-- Amount Display -->
                                <div class="bg-gray-100 rounded-lg p-4 text-center">
                                    <span class="text-gray-600">মোট পরিমাণ: </span>
                                    <span id="totalAmount" class="text-2xl font-bold text-primary-600">৳0</span>
                                </div>
                            </div>

                            <!-- Jersey Details (Conditional) -->
                            <div id="jerseySection" class="mb-8 hidden">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    জার্সির বিবরণ
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label for="jersey_size_id" class="label">জার্সির সাইজ <span
                                                class="text-red-500">*</span></label>
                                        <select id="jersey_size_id" name="jersey_size_id"
                                            class="input-field @error('jersey_size_id') border-red-500 @enderror">
                                            <option value="">সাইজ নির্বাচন করুন</option>
                                            @foreach ($jerseySizes as $size)
                                                <option value="{{ $size->id }}"
                                                    {{ old('jersey_size_id') == $size->id ? 'selected' : '' }}>
                                                    {{ $size->size }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jersey_size_id')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="name_on_jersey" class="label">জার্সিতে নাম <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="name_on_jersey" name="name_on_jersey"
                                            value="{{ old('name_on_jersey') }}"
                                            class="input-field @error('name_on_jersey') border-red-500 @enderror"
                                            placeholder="সর্বোচ্চ ১৫ অক্ষর" maxlength="15">
                                        @error('name_on_jersey')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="number_on_jersey" class="label">জার্সিতে নম্বর <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="number_on_jersey" name="number_on_jersey"
                                            value="{{ old('number_on_jersey') }}"
                                            class="input-field @error('number_on_jersey') border-red-500 @enderror"
                                            placeholder="যেমন, ১০" maxlength="5">
                                        @error('number_on_jersey')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                        </path>
                                    </svg>
                                    পেমেন্টের তথ্য
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label for="sent_from" class="label">যে নম্বর থেকে পাঠিয়েছেন <span
                                                class="text-red-500">*</span></label>
                                        <input type="number" id="sent_from" name="sent_from"
                                            value="{{ old('sent_from') }}"
                                            class="input-field @error('sent_from') border-red-500 @enderror"
                                            placeholder="যে নম্বর থেকে টাকা পাঠিয়েছেন" required>
                                        @error('sent_from')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="sent_to_phone_id" class="label">যে নম্বরে পাঠিয়েছেন <span
                                                class="text-red-500">*</span></label>
                                        <select id="sent_to_phone_id" name="sent_to_phone_id"
                                            class="input-field @error('sent_to_phone_id') border-red-500 @enderror"
                                            required>
                                            <option value="">যে নম্বরে টাকা পাঠিয়েছেন তা নির্বাচন করুন</option>
                                            @foreach ($phoneNumbers as $phone)
                                                <option value="{{ $phone->id }}"
                                                    {{ old('sent_to_phone_id') == $phone->id ? 'selected' : '' }}>
                                                    {{ $phone->number }} ({{ $phone->operator }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sent_to_phone_id')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="transaction_id" class="label">ট্রানজেকশন আইডি / রেফারেন্স</label>
                                        <input type="text" id="transaction_id" name="transaction_id"
                                            value="{{ old('transaction_id') }}"
                                            class="input-field @error('transaction_id') border-red-500 @enderror"
                                            placeholder="বিকাশ/নগদ ট্রানজেকশন আইডি দিন">
                                        @error('transaction_id')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- OR Divider -->
                                    <div class="flex items-center gap-4 my-2">
                                        <div class="flex-1 h-px bg-gray-200"></div>
                                        <span class="text-sm font-medium text-gray-400 uppercase">অথবা</span>
                                        <div class="flex-1 h-px bg-gray-200"></div>
                                    </div>

                                    <!-- Screenshot Upload -->
                                    <div>
                                        <label for="screenshot" class="label">পেমেন্টের স্ক্রিনশট</label>
                                        <div class="relative">
                                            <label for="screenshot"
                                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-primary-400 hover:bg-primary-50/50 transition-colors duration-200 @error('screenshot') border-red-500 @enderror"
                                                id="screenshotDropZone">
                                                <div id="screenshotPlaceholder"
                                                    class="flex flex-col items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400 mb-2" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500">স্ক্রিনশট আপলোড করতে ক্লিক
                                                        করুন</span>
                                                    <span class="text-xs text-gray-400 mt-1">সর্বোচ্চ ৫ মেগাবাইট (PNG,
                                                        JPG)</span>
                                                </div>
                                                <div id="screenshotPreview" class="hidden flex items-center gap-3">
                                                    <img id="screenshotThumb" src="" alt="Preview"
                                                        class="h-20 rounded-lg object-cover">
                                                    <div class="text-left">
                                                        <p id="screenshotName"
                                                            class="text-sm font-medium text-gray-700">
                                                        </p>
                                                        <p id="screenshotSize" class="text-xs text-gray-400"></p>
                                                        <button type="button" onclick="clearScreenshot(event)"
                                                            class="text-xs text-red-500 hover:text-red-700 font-medium mt-1 cursor-pointer">মুছুন</button>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="file" id="screenshot" name="screenshot" accept="image/*"
                                                class="hidden" onchange="previewScreenshot(this)">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">পেমেন্টের প্রমাণ হিসেবে ট্রানজেকশন আইডি
                                            অথবা
                                            স্ক্রিনশট প্রদান করুন।</p>
                                        @error('screenshot')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-primary w-full text-lg">
                                রেজিস্ট্রেশন সাবমিট করুন
                            </button>

                            <p class="text-center text-sm text-gray-500 mt-4">
                                সাবমিট করার মাধ্যমে আপনি আমাদের শর্তাবলীতে সম্মত হচ্ছেন।
                            </p>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Verified Participants List Section -->
    <section class="py-20 bg-white relative overflow-hidden" id="participants">
        <!-- Background Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute -top-40 -right-40 w-96 h-96 bg-primary-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50">
            </div>
            <div
                class="absolute top-40 -left-40 w-96 h-96 bg-gold-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-primary-50 text-primary-600 text-sm font-semibold tracking-wider mb-4 border border-primary-100">COMMUNITY</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">নিশ্চিতকৃত
                    অংশগ্রহণকারী</h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-primary-500 to-gold-400 mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-gray-500">যারা ইতোমধ্যে সফলভাবে রেজিস্ট্রেশন সম্পন্ন করেছেন এবং আমাদের সাথে
                    যুক্ত হয়েছেন তাদের তালিকা</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                @forelse($verifiedList as $participant)
                    <div
                        class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] hover:border-primary-100 transition-all duration-300 relative overflow-hidden flex flex-col items-center">
                        <!-- Card Glow on Hover -->
                        <div
                            class="absolute -top-20 -right-20 w-40 h-40 bg-gradient-to-br from-primary-400/10 to-gold-400/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <!-- Avatar -->
                        <div
                            class="w-20 h-20 rounded-full bg-gradient-to-br from-gray-50 to-gray-100 border-4 border-white shadow-md flex items-center justify-center mb-5 relative z-10 group-hover:-translate-y-1 transition-transform duration-300">
                            <span
                                class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-br from-primary-600 to-primary-800">
                                {{ mb_substr($participant->name, 0, 1) }}
                            </span>
                        </div>

                        <!-- Participant Info -->
                        <h3
                            class="text-lg font-bold text-gray-800 text-center mb-3 line-clamp-1 relative z-10 w-full group-hover:text-primary-600 transition-colors">
                            {{ $participant->name }}</h3>

                        <div
                            class="mt-auto space-y-2 relative z-10 flex flex-col items-center w-full pt-4 border-t border-gray-50">
                            @if (isset($participant->type) && $participant->type === 'sponsor')
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    সম্মানিত স্পনসর
                                </span>
                            @endif

                            <span
                                class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold tracking-wide uppercase
                                @if ($participant->donation_type === 'iftar') bg-green-50 text-green-700
                                @elseif($participant->donation_type === 'jersey') bg-blue-50 text-blue-700
                                @else bg-cyan-50 text-cyan-700 @endif">
                                {{ $participant->donation_type_label }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-16 flex flex-col items-center justify-center bg-gray-50/50 rounded-3xl border border-dashed border-gray-200">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg font-medium">এখনো কোনো অংশগ্রহণকারী নিশ্চিত হয়নি</p>
                        <p class="text-gray-400 text-sm mt-1">তালিকাভুক্ত হতে আজই রেজিস্ট্রেশন করুন</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-2">Government Islampur Nekjahan Pilot Model High School</h3>
                <p class="text-gray-400 mb-4">SSC-2013 Batch</p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                </div>
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} SSC-2013 Batch. সর্বস্বত্ব সংরক্ষিত।
                </p>
                <p class="text-gray-600 text-sm mt-2">
                    Developed with ❤️ by <a href="https://www.facebook.com/ImMaheKarim" target="_blank"
                        class="text-gold-400 font-medium hover:underline">Mahi Karim</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // ── Copy Phone Number ──
        function copyPhoneNumber(number, element) {
            navigator.clipboard.writeText(number).then(() => {
                // Show success feedback
                const feedback = element.querySelector('.copy-feedback');
                feedback.classList.remove('hidden');

                // Add success styling
                element.classList.add('border-green-400', 'bg-green-50');

                // Hide feedback after 2 seconds
                setTimeout(() => {
                    feedback.classList.add('hidden');
                    element.classList.remove('border-green-400', 'bg-green-50');
                }, 2000);
            }).catch(err => {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = number;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);

                const feedback = element.querySelector('.copy-feedback');
                feedback.classList.remove('hidden');
                element.classList.add('border-green-400', 'bg-green-50');

                setTimeout(() => {
                    feedback.classList.add('hidden');
                    element.classList.remove('border-green-400', 'bg-green-50');
                }, 2000);
            });
        }

        // ── Screenshot Preview ──
        function previewScreenshot(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('screenshotThumb').src = e.target.result;
                    document.getElementById('screenshotName').textContent = file.name;
                    document.getElementById('screenshotSize').textContent = (file.size / 1024 / 1024).toFixed(2) +
                        ' MB';
                    document.getElementById('screenshotPlaceholder').classList.add('hidden');
                    document.getElementById('screenshotPreview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function clearScreenshot(e) {
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('screenshot').value = '';
            document.getElementById('screenshotThumb').src = '';
            document.getElementById('screenshotPlaceholder').classList.remove('hidden');
            document.getElementById('screenshotPreview').classList.add('hidden');
        }

        const donationTypeInput = document.getElementById('donationType');
        const jerseySection = document.getElementById('jerseySection');
        const totalAmountEl = document.getElementById('totalAmount');
        const jerseyFields = ['jersey_size_id', 'name_on_jersey', 'number_on_jersey'];
        const allCards = document.querySelectorAll('.donation-card');

        function selectDonation(card) {
            const type = card.dataset.type;
            const amount = card.dataset.amount;

            // If clicking the already-selected card, deselect it
            if (donationTypeInput.value === type) {
                donationTypeInput.value = '';
                resetAllCards();
                updateJerseySection(false);
                totalAmountEl.textContent = '৳0';
                return;
            }

            // Deselect all cards first
            resetAllCards();

            // Select the clicked card
            donationTypeInput.value = type;

            if (type === 'both') {
                card.classList.remove('border-gray-200');
                card.classList.add('border-gold-500', 'bg-gold-50', 'shadow-md');
            } else {
                card.classList.remove('border-gray-200');
                card.classList.add('border-primary-500', 'bg-primary-50', 'shadow-md');
            }

            // Show checkmark
            card.querySelector('.check-icon').classList.remove('hidden');

            // Update amount
            totalAmountEl.textContent = '৳' + amount;

            // Toggle jersey section
            const isJersey = type === 'jersey' || type === 'both';
            updateJerseySection(isJersey);
        }

        function resetAllCards() {
            allCards.forEach(c => {
                c.classList.remove('border-primary-500', 'bg-primary-50', 'border-gold-500', 'bg-gold-50',
                    'shadow-md');
                c.classList.add('border-gray-200');
                c.querySelector('.check-icon').classList.add('hidden');
            });
        }

        function updateJerseySection(show) {
            if (show) {
                jerseySection.classList.remove('hidden');
                jerseyFields.forEach(fieldId => {
                    document.getElementById(fieldId).setAttribute('required', 'required');
                });
            } else {
                jerseySection.classList.add('hidden');
                jerseyFields.forEach(fieldId => {
                    document.getElementById(fieldId).removeAttribute('required');
                });
            }
        }

        // Form validation: ensure donation_type is selected before submit
        document.getElementById('donationForm').addEventListener('submit', function(e) {
            if (!donationTypeInput.value) {
                e.preventDefault();
                alert('দয়া করে একটি অপশন নির্বাচন করুন।');
                return false;
            }
        });

        // Restore selection on page load (e.g., after validation error)
        document.addEventListener('DOMContentLoaded', function() {
            const savedType = donationTypeInput.value;
            if (savedType) {
                allCards.forEach(card => {
                    if (card.dataset.type === savedType) {
                        selectDonation(card);
                    }
                });
            }

            // Fix input focus styles — Tailwind v4 Preflight overrides all CSS focus rules,
            // so we must apply styles directly via JavaScript inline styles.
            document.querySelectorAll('.input-field').forEach(field => {
                // Set default border
                field.style.setProperty('border', '1px solid #d1d5db', 'important');

                field.addEventListener('focus', function() {
                    this.style.setProperty('border', '1px solid #22c55e', 'important');
                    this.style.setProperty('box-shadow', '0 0 0 3px rgba(22, 163, 74, 0.2)',
                        'important');
                    this.style.setProperty('outline', 'none', 'important');
                });

                field.addEventListener('blur', function() {
                    this.style.setProperty('border', '1px solid #d1d5db', 'important');
                    this.style.setProperty('box-shadow', 'none', 'important');
                });
            });

            // ── Countdown Timer ──
            const daysEl = document.getElementById('countdown-days');
            const hoursEl = document.getElementById('countdown-hours');
            const minutesEl = document.getElementById('countdown-minutes');
            const secondsEl = document.getElementById('countdown-seconds');

            if (daysEl && hoursEl && minutesEl && secondsEl) {
                const iftarDate = '{{ $iftarDate ?? '' }}';
                if (iftarDate) {
                    const targetDate = new Date(iftarDate + 'T18:00:00').getTime();

                    function updateCountdown() {
                        const now = new Date().getTime();
                        const diff = targetDate - now;

                        if (diff <= 0) {
                            daysEl.textContent = '0';
                            hoursEl.textContent = '0';
                            minutesEl.textContent = '0';
                            secondsEl.textContent = '0';
                            return;
                        }

                        daysEl.textContent = Math.floor(diff / (1000 * 60 * 60 * 24));
                        hoursEl.textContent = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        minutesEl.textContent = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        secondsEl.textContent = Math.floor((diff % (1000 * 60)) / 1000);
                    }

                    updateCountdown();
                    setInterval(updateCountdown, 1000);
                }
            }

            // ── Participant Counter Animation ──
            const counterEl = document.getElementById('participant-count');
            if (counterEl) {
                const target = parseInt(counterEl.dataset.target) || 0;
                if (target > 0) {
                    const duration = 2000;
                    const startTime = performance.now();

                    function animateCounter(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        // Ease-out cubic
                        const eased = 1 - Math.pow(1 - progress, 3);
                        counterEl.textContent = Math.floor(eased * target);

                        if (progress < 1) {
                            requestAnimationFrame(animateCounter);
                        } else {
                            counterEl.textContent = target;
                        }
                    }
                    requestAnimationFrame(animateCounter);
                }
            }

            // ── Hero Entrance Animations ──
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!prefersReducedMotion) {
                const heroAnimElements = document.querySelectorAll('.hero-animate');
                heroAnimElements.forEach(el => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(30px)';
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const delay = parseFloat(el.style.animationDelay) || 0;
                            setTimeout(() => {
                                el.style.transition =
                                    'opacity 0.7s ease-out, transform 0.7s ease-out';
                                el.style.opacity = '1';
                                el.style.transform = 'translateY(0)';
                            }, delay * 1000);
                            observer.unobserve(el);
                        }
                    });
                }, {
                    threshold: 0.1
                });

                heroAnimElements.forEach(el => observer.observe(el));
            }
        });
    </script>
</body>

</html>
