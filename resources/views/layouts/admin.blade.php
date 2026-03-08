<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Admin') - SSC-2013 Batch</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Mobile sidebar animation — scoped to mobile only */
        @media (max-width: 767px) {
            .sidebar-mobile {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar-mobile.open {
                transform: translateX(0);
            }

            /* Backdrop for mobile sidebar */
            .sidebar-backdrop {
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            }

            .sidebar-backdrop.open {
                opacity: 1;
                visibility: visible;
            }
        }

        /* Touch-friendly tap targets */
        @media (max-width: 768px) {
            .mobile-tap-target {
                min-height: 44px;
                min-width: 44px;
            }

            .mobile-btn {
                padding: 12px 20px;
            }
        }

        /* Bottom Navigation Bar */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 40;
            background: #0f172a;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: env(safe-area-inset-bottom, 0px);
        }

        .bottom-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 6px 0;
            color: rgba(255, 255, 255, 0.45);
            font-size: 10px;
            font-weight: 500;
            transition: color 0.2s;
            -webkit-tap-highlight-color: transparent;
            position: relative;
        }

        .bottom-nav-item.active {
            color: #facc15;
        }

        .bottom-nav-item.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 24px;
            height: 2px;
            background: #facc15;
            border-radius: 0 0 2px 2px;
        }

        .bottom-nav-item svg {
            width: 20px;
            height: 20px;
            margin-bottom: 2px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Mobile Sidebar Backdrop -->
        <div id="sidebarBackdrop" class="sidebar-backdrop fixed inset-0 bg-black/50 z-40 md:hidden"
            onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="sidebar-mobile fixed md:static inset-y-0 left-0 w-64 bg-slate-900 text-white z-50 md:transform-none md:transition-none">
            <div class="p-4 md:p-6 flex justify-between items-center">
                <div>
                    <h1 class="text-xl font-bold text-gold-400">SSC-2013 Admin</h1>
                    <p class="text-sm text-slate-400 mt-1">Registration System</p>
                </div>
                <!-- Close button for mobile -->
                <button onclick="toggleSidebar()" class="md:hidden p-2 text-white/80 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <nav class="mt-6 overflow-y-auto max-h-[calc(100vh-100px)]">
                <a href="{{ route('admin.dashboard') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.registrations.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.registrations.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Registrations
                </a>
                <a href="{{ route('admin.phone-numbers.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.phone-numbers.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    Phone Numbers
                </a>
                <a href="{{ route('admin.jersey-sizes.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.jersey-sizes.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    Jersey Sizes
                </a>
                <a href="{{ route('admin.site-settings.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.site-settings.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Site Settings
                </a>
                <a href="{{ route('admin.login-history.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.login-history.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Login History
                </a>
                <a href="{{ route('admin.activity-log.index') }}"
                    class="mobile-tap-target flex items-center px-4 md:px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.activity-log.*') ? 'bg-slate-800 border-l-4 border-gold-400' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    Activity Log
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-30">
                <div class="px-4 md:px-6 py-3 md:py-4 flex justify-between items-center">
                    <!-- Mobile Menu Button -->
                    <button onclick="toggleSidebar()"
                        class="md:hidden p-2 -ml-2 text-gray-600 hover:text-gray-800 mobile-tap-target">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <h2 class="text-lg md:text-xl font-semibold text-gray-800 truncate">@yield('page-title', 'Dashboard')</h2>

                    <div class="flex items-center space-x-2 md:space-x-4">
                        <span
                            class="hidden sm:block text-sm text-gray-600 truncate max-w-[100px] md:max-w-none">{{ Auth::guard('admin')->user()->name }}</span>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="mobile-tap-target mobile-btn inline-flex items-center px-3 md:px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors cursor-pointer">
                                <svg class="w-4 h-4 md:mr-1.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span class="hidden md:inline">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-3 md:p-6 overflow-y-auto pb-20 md:pb-6">
                @if (session('success'))
                    <div
                        class="mb-4 md:mb-6 bg-green-50 border border-green-200 text-green-800 px-3 md:px-4 py-3 rounded-lg text-sm md:text-base">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="mb-4 md:mb-6 bg-red-50 border border-red-200 text-red-800 px-3 md:px-4 py-3 rounded-lg text-sm md:text-base">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav class="bottom-nav md:hidden">
        <div class="flex items-center justify-around">
            <a href="{{ route('admin.dashboard') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Home
            </a>
            <a href="{{ route('admin.registrations.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                Regs
            </a>
            <a href="{{ route('admin.phone-numbers.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.phone-numbers.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                </svg>
                Phones
            </a>
            <a href="{{ route('admin.jersey-sizes.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.jersey-sizes.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
                Jersey
            </a>
            <a href="{{ route('admin.site-settings.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                Settings
            </a>
            <a href="{{ route('admin.login-history.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.login-history.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                Login
            </a>
            <a href="{{ route('admin.activity-log.index') }}"
                class="bottom-nav-item {{ request()->routeIs('admin.activity-log.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                Activity
            </a>
        </div>
    </nav>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            sidebar.classList.toggle('open');
            backdrop.classList.toggle('open');

            if (sidebar.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        // Close sidebar when clicking on a link (mobile)
        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    toggleSidebar();
                }
            });
        });

        // Close sidebar on window resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebarBackdrop');
                sidebar.classList.remove('open');
                backdrop.classList.remove('open');
                document.body.style.overflow = '';
            }
        });

        // Swipe-to-close sidebar gesture
        (function() {
            const sidebar = document.getElementById('sidebar');
            let touchStartX = 0;
            let touchCurrentX = 0;
            let isSwiping = false;

            sidebar.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
                isSwiping = true;
            }, {
                passive: true
            });

            sidebar.addEventListener('touchmove', (e) => {
                if (!isSwiping) return;
                touchCurrentX = e.touches[0].clientX;
                const diff = touchStartX - touchCurrentX;
                if (diff > 0) {
                    sidebar.style.transform = `translateX(-${Math.min(diff, 260)}px)`;
                    sidebar.style.transition = 'none';
                }
            }, {
                passive: true
            });

            sidebar.addEventListener('touchend', () => {
                if (!isSwiping) return;
                isSwiping = false;
                const diff = touchStartX - touchCurrentX;
                sidebar.style.transform = '';
                sidebar.style.transition = '';
                if (diff > 80 && sidebar.classList.contains('open')) {
                    toggleSidebar();
                }
            }, {
                passive: true
            });
        })();
    </script>
</body>

</html>
