<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PLN Payment System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
        }
        .bg-pln-blue {
            background-color: #0c4da2;
        }
        .hover-bg-pln-blue-dark:hover {
            background-color: #0a4080;
        }
        .text-pln-blue {
            color: #0c4da2;
        }
        .bg-pln-yellow {
            background-color: #ffcb05;
        }
        .text-pln-yellow {
            color: #ffcb05;
        }
        .btn-pln {
            background-color: #ffcb05;
            color: #0c4da2;
            transition: all 0.3s;
        }
        .btn-pln:hover {
            background-color: #ffd735;
        }
        .active-nav-link {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #ffcb05;
        }
        .sidebar-link {
            transition: all 0.2s;
        }
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .card-dashboard {
            transition: all 0.3s;
        }
        .card-dashboard:hover {
            transform: translateY(-5px);
        }
        .menu-icon {
            width: 20px;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar for desktop -->
        <div class="hidden md:flex md:flex-col md:fixed md:inset-y-0 md:w-64 bg-pln-blue text-white shadow-lg">
            <div class="flex items-center justify-center h-20 border-b border-blue-800">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-pln-yellow">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    <span class="ml-2 flex items-center space-x-2">
                      <img src="img/LOGO BSI.jpeg" alt="Logo BSI" class="h-8 object-contain">
                      <span class="text-xl font-bold">PLN Payment</span>
                    </span>
                </div>
            </div>
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1">
                        <a href="{{ route('home') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md {{ request()->routeIs('home') ? 'active-nav-link' : '' }}">
                            <span class="menu-icon mr-3"><i class="fas fa-home"></i></span>
                            Home
                        </a>

                        <a href="{{ route('payments.index') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md {{ request()->routeIs('payments.index') ? 'active-nav-link' : '' }}">
                            <span class="menu-icon mr-3"><i class="fas fa-credit-card"></i></span>
                            Pembayaran
                        </a>

                        <a href="{{ route('payments.history') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md {{ request()->routeIs('payments.history') ? 'active-nav-link' : '' }}">
                            <span class="menu-icon mr-3"><i class="fas fa-history"></i></span>
                            Riwayat Pembayaran
                        </a>

                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('users.index') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md {{ request()->routeIs('users.*') ? 'active-nav-link' : '' }}">
                                <span class="menu-icon mr-3"><i class="fas fa-users"></i></span>
                                Anggota
                            </a>
                        @endif

                        <div class="pt-4 mt-4 border-t border-blue-800">
                            <div class="px-2 space-y-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-red-300 hover:bg-red-900 hover:bg-opacity-20">
                                        <span class="menu-icon mr-3"><i class="fas fa-sign-out-alt"></i></span>
                                        Logout
                                    </a>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="flex-shrink-0 p-4 border-t border-blue-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                <span class="text-lg font-bold text-blue-800">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs font-medium text-blue-200">{{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile header -->
        <div class="md:pl-64 flex flex-col flex-1">
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow md:hidden">
                <button type="button" id="mobile-menu-button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#0c4da2" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                        <span class="ml-2 font-semibold text-blue-800">PLN Payment</span>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="relative">
                            <div>
                                <button type="button" id="profile-dropdown" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span class="sr-only">Open user menu</span>
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-sm font-bold text-blue-800">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                </button>
                            </div>
                            <div id="profile-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                <div class="px-4 py-2 text-sm text-gray-700 border-b border-gray-100">
                                    <p class="font-medium">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        Logout
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-sidebar" class="hidden fixed inset-0 z-40">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
                <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-pln-blue">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button type="button" id="close-sidebar" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-center h-16">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-pln-yellow">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-white">PLN Payment</span>
                        </div>
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <a href="{{ route('home') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-white {{ request()->routeIs('home') ? 'active-nav-link' : '' }}">
                                <span class="menu-icon mr-3"><i class="fas fa-home"></i></span>
                                Home
                            </a>

                            <a href="{{ route('payments.index') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-white {{ request()->routeIs('payments.index') ? 'active-nav-link' : '' }}">
                                <span class="menu-icon mr-3"><i class="fas fa-credit-card"></i></span>
                                Pembayaran
                            </a>

                            <a href="{{ route('payments.history') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-white {{ request()->routeIs('payments.history') ? 'active-nav-link' : '' }}">
                                <span class="menu-icon mr-3"><i class="fas fa-history"></i></span>
                                Riwayat Pembayaran
                            </a>

                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('users.index') }}" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-white {{ request()->routeIs('users.*') ? 'active-nav-link' : '' }}">
                                    <span class="menu-icon mr-3"><i class="fas fa-users"></i></span>
                                    Anggota
                                </a>
                            @endif

                            <div class="pt-4 mt-4 border-t border-blue-800">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="sidebar-link group flex items-center px-2 py-3 text-sm font-medium rounded-md text-red-300 hover:bg-red-900 hover:bg-opacity-20">
                                        <span class="menu-icon mr-3"><i class="fas fa-sign-out-alt"></i></span>
                                        Logout
                                    </a>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>

            <!-- Main content -->
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Dashboard' }}</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript for mobile menu and dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebar = document.getElementById('close-sidebar');

            if (mobileMenuButton && mobileSidebar && closeSidebar) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileSidebar.classList.toggle('hidden');
                });

                closeSidebar.addEventListener('click', () => {
                    mobileSidebar.classList.add('hidden');
                });
            }

            // Profile dropdown
            const profileDropdown = document.getElementById('profile-dropdown');
            const profileMenu = document.getElementById('profile-menu');

            if (profileDropdown && profileMenu) {
                profileDropdown.addEventListener('click', () => {
                    profileMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (event) => {
                    if (!profileDropdown.contains(event.target) && !profileMenu.contains(event.target)) {
                        profileMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
