<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-blue-800 to-blue-600">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center mb-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#0c4da2" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    <span class="ml-2 flex items-center space-x-2">
                      <img src="img/LOGO BSI.jpeg" alt="Logo BSI" class="h-8 object-contain">
                      <span class="text-xl font-bold">PLN Payment</span>
                    </span>
                </div>
            </div>

            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Login Akun</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" class="text-gray-700" />

                    <x-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <div class="flex justify-between items-center">
                        <x-label for="password" :value="__('Password')" class="text-gray-700" />

                    </div>

                    <x-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-800 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-center mt-6">
                <span class="text-sm text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="ml-2 text-sm text-blue-700 hover:text-blue-900">Daftar</a>
            </div>
        </div>

        <div class="flex justify-center mt-4 text-white">
            <a href="{{ url('/') }}" class="text-sm hover:underline">
                ← Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</x-guest-layout>
