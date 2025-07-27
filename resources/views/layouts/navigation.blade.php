<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('payments.index')" :active="request()->routeIs('payments.index')">
                        {{ __('Pembayaran') }}
                    </x-nav-link>

                    <x-nav-link :href="route('payments.history')" :active="request()->routeIs('payments.history')">
                        {{ __('Riwayat Pembayaran') }}
                    </x-nav-link>

                    @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                            {{ __('Anggota') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <!-- Kode asli dari Laravel Breeze untuk dropdown user -->

            <!-- Hamburger -->
            <!-- Kode asli dari Laravel Breeze untuk hamburger menu mobile -->
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <!-- Kode asli dari Laravel Breeze untuk menu mobile, tambahkan juga menu yang sama -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('payments.index')" :active="request()->routeIs('payments.index')">
                {{ __('Pembayaran') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('payments.history')" :active="request()->routeIs('payments.history')">
                {{ __('Riwayat Pembayaran') }}
            </x-responsive-nav-link>

            @if(Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                    {{ __('Anggota') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <!-- Kode asli dari Laravel Breeze untuk responsive settings -->
    </div>
</nav>
