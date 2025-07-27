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

            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Daftar Akun Baru</h2>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nama Lengkap')" class="text-gray-700" />

                    <x-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" class="text-gray-700" />

                    <x-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" class="text-gray-700" />

                    <x-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700" />

                    <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm"
                             type="password"
                             name="password_confirmation" required />
                </div>

                <!-- Phone Number (Optional) -->
                <div class="mt-4">
                    <x-label for="phone_number" :value="__('Nomor Telepon (Opsional)')" class="text-gray-700" />

                    <x-input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="phone_number" :value="old('phone_number')" />
                </div>

                <!-- Address (Optional) -->
                <div class="mt-4">
                    <x-label for="address" :value="__('Alamat (Opsional)')" class="text-gray-700" />

                    <textarea id="address" name="address" rows="2" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('address') }}</textarea>
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-800 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150">
                        {{ __('Daftar') }}
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-center mt-6">
                <span class="text-sm text-gray-600">Sudah punya akun?</span>
                <a href="{{ route('login') }}" class="ml-2 text-sm text-blue-700 hover:text-blue-900">Login</a>
            </div>
        </div>

        <div class="flex justify-center mt-4 text-white">
            <a href="{{ url('/') }}" class="text-sm hover:underline">
                ← Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</x-guest-layout>
