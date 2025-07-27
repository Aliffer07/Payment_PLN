<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-6">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Welcome section -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-6">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div class="ml-5">
                        <h2 class="text-xl font-semibold text-gray-900">Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <p class="text-gray-500 text-sm">{{ now()->format('l, d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ Auth::user()->isAdmin() ? '4' : '3' }} gap-6 mb-8">
            <div class="card-dashboard bg-gradient-to-br from-blue-600 to-blue-700 overflow-hidden shadow-lg rounded-lg">
                <div class="px-4 py-5 sm:p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-30 rounded-md p-3">
                            <i class="fas fa-receipt text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-blue-100 truncate">Total Pembayaran</dt>
                                <dd>
                                    <div class="text-3xl font-semibold text-white">{{ $stats['total_payments'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-dashboard bg-gradient-to-br from-green-600 to-green-700 overflow-hidden shadow-lg rounded-lg">
                <div class="px-4 py-5 sm:p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-30 rounded-md p-3">
                            <i class="fas fa-money-bill text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-green-100 truncate">Total Pembayaran (Rp)</dt>
                                <dd>
                                    <div class="text-3xl font-semibold text-white">{{ number_format($stats['total_amount'], 0, ',', '.') }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-dashboard bg-gradient-to-br from-yellow-500 to-yellow-600 overflow-hidden shadow-lg rounded-lg">
                <div class="px-4 py-5 sm:p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-30 rounded-md p-3">
                            <i class="fas fa-bolt text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-yellow-100 truncate">Total kWh</dt>
                                <dd>
                                    <div class="text-3xl font-semibold text-white">{{ number_format($stats['total_kwh'], 0, ',', '.') }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin())
                <div class="card-dashboard bg-gradient-to-br from-purple-600 to-purple-700 overflow-hidden shadow-lg rounded-lg">
                    <div class="px-4 py-5 sm:p-6 text-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-white bg-opacity-30 rounded-md p-3">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-purple-100 truncate">Total Pelanggan</dt>
                                    <dd>
                                        <div class="text-3xl font-semibold text-white">{{ $stats['total_users'] }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Action Cards -->
        <h3 class="text-lg font-medium text-gray-900 mb-4">Navigasi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card-dashboard bg-white overflow-hidden shadow-lg rounded-lg transition-all duration-300 border-t-4 border-blue-500">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                            <i class="fas fa-credit-card text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Buat Pembayaran</h3>
                            <p class="mt-1 text-sm text-gray-500">Isi form pembayaran PLN dengan cepat</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('payments.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                            Bayar Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-dashboard bg-white overflow-hidden shadow-lg rounded-lg transition-all duration-300 border-t-4 border-green-500">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                            <i class="fas fa-history text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Riwayat Pembayaran</h3>
                            <p class="mt-1 text-sm text-gray-500">Lihat semua pembayaran sebelumnya</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('payments.history') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                            Lihat Riwayat
                        </a>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin())
                <div class="card-dashboard bg-white overflow-hidden shadow-lg rounded-lg transition-all duration-300 border-t-4 border-purple-500">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                                <i class="fas fa-user-plus text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Kelola Anggota</h3>
                                <p class="mt-1 text-sm text-gray-500">Tambah atau edit data anggota</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700">
                                Kelola Anggota
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-dashboard bg-white overflow-hidden shadow-lg rounded-lg transition-all duration-300 border-t-4 border-yellow-500">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                                <i class="fas fa-user text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Profil Saya</h3>
                                <p class="mt-1 text-sm text-gray-500">Informasi akun Anda</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-sm text-gray-500">
                                <p><span class="font-medium text-gray-700">Nama:</span> {{ Auth::user()->name }}</p>
                                <p><span class="font-medium text-gray-700">Email:</span> {{ Auth::user()->email }}</p>
                                <p><span class="font-medium text-gray-700">No. Telepon:</span> {{ Auth::user()->phone_number ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if(Auth::user()->isAdmin())
            <!-- Recent Activity - Admin Only -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aktivitas Terbaru</h3>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        @php
                            $recentPayments = App\Models\Payment::with('user')->latest()->take(5)->get();
                        @endphp

                        @forelse($recentPayments as $payment)
                            <li>
                                <a href="{{ route('payments.history') }}" class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                        <i class="fas fa-receipt text-blue-600"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-blue-600">
                                                        Invoice #{{ $payment->invoice_number }}
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        {{ $payment->user->name }} - Rp {{ number_format($payment->total_amount, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="ml-2 flex-shrink-0 flex">
                                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ ucfirst($payment->payment_status) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    <i class="fas fa-bolt flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400"></i>
                                                    {{ number_format($payment->kwh_usage, 0, ',', '.') }} kWh
                                                </p>
                                            </div>
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <i class="fas fa-calendar flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400"></i>
                                                <p>
                                                    {{ $payment->created_at->format('d M Y H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="px-4 py-5 sm:px-6">
                                <p class="text-sm text-gray-500">Belum ada pembayaran terbaru.</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
