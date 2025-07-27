<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pembayaran PLN</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-pattern {
            background-color: #0c4da2;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .btn-pln {
            background-color: #ffcb05;
            color: #0c4da2;
        }
        .btn-pln:hover {
            background-color: #ffd735;
        }
        .pln-blue {
            color: #0c4da2;
        }
        .pln-yellow {
            color: #ffcb05;
        }
        .bg-pln-blue {
            background-color: #0c4da2;
        }
        .bg-pln-yellow {
            background-color: #ffcb05;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <!-- PLN Logo -->
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#0c4da2" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                            <span  class="ml-2 font-bold text-xl pln-blue">
                                <img src="img/LOGO BSI.jpeg" alt="Logo BSI" style="height: 24px; display: inline-block; vertical-align: middle; margin-right: 8px;">
                                PLN Payment by Alif fadhlurrohman 17220845</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/home') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:underline transition ease-in-out duration-150">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pln-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Daftar
                                    </a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-pattern py-16 lg:py-24">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center px-6 lg:px-8">

            <!-- Kiri: Konten -->
            <div class="text-white">
                <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                    <span class="block">Sistem Pembayaran</span>
                    <span class="block text-yellow-400">PLN Online</span>
                </h1>
                <p class="mt-4 text-lg sm:text-xl">
                    Bayar tagihan listrik Anda dengan cepat, aman, dan praktis melalui sistem pembayaran online kami. Dapatkan akses ke riwayat pembayaran dan invoice digital kapan saja.
                </p>
                <div class="mt-6 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium rounded-md btn-pln shadow hover:shadow-md transition">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium rounded-md text-blue-700 bg-white hover:bg-gray-100 shadow hover:shadow-md transition">
                        Login
                    </a>
                </div>
            </div>

            <!-- Kanan: Gambar -->
                <div class="flex justify-center items-center space-x-4 translate-x-10">
                <!-- Logo BSI -->
                <img src="img/LOGO BSI.jpeg" alt="Logo BSI" class="h-40 object-contain">

                <!-- Gambar PLN -->
                <img src="img/pln.png" alt="PLN Illustration" class="h-40 object-contain">
            </div>
    </section>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fitur Utama</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Pembayaran PLN Lebih Mudah
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Nikmati kemudahan dan kenyamanan dalam melakukan pembayaran listrik Anda.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="pt-6 transition duration-300 ease-in-out card-hover">
                        <div class="flow-root bg-white rounded-lg px-6 pb-8 shadow">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Pembayaran Cepat</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Proses pembayaran yang cepat dan langsung terupdate di sistem. Anda tidak perlu mengantri atau menunggu lama.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 transition duration-300 ease-in-out card-hover">
                        <div class="flow-root bg-white rounded-lg px-6 pb-8 shadow">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Invoice Digital</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Dapatkan bukti pembayaran dalam bentuk PDF yang bisa diunduh dan disimpan untuk kebutuhan Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 transition duration-300 ease-in-out card-hover">
                        <div class="flow-root bg-white rounded-lg px-6 pb-8 shadow">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Riwayat Pembayaran</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Akses dan pantau semua riwayat pembayaran Anda kapan saja. Data tersimpan dengan aman di sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Cara Kerja</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Mudah dan Praktis
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Ikuti langkah-langkah sederhana untuk melakukan pembayaran PLN.
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pln-blue text-white">
                                <span class="text-xl font-bold">1</span>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Registrasi & Login</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Daftar akun baru atau login jika sudah memiliki akun untuk mengakses sistem.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pln-blue text-white">
                                <span class="text-xl font-bold">2</span>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Isi Form Pembayaran</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Masukkan nomor meteran, jumlah kWh, dan sistem akan menghitung total tagihan Anda.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pln-blue text-white">
                                <span class="text-xl font-bold">3</span>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Dapatkan Bukti Pembayaran</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Setelah pembayaran selesai, Anda akan mendapatkan bukti pembayaran dalam bentuk PDF.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-pln-blue">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Siap untuk memulai?</span>
                <span class="block text-yellow-400">Daftar sekarang dan kelola pembayaran PLN Anda.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md btn-pln">
                        Daftar
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <p class="mt-8 text-center text-base text-gray-500">
                &copy; {{ date('Y') }} Sistem Pembayaran PLN by Alif Fadhlurrohman 17220845.
            </p>
        </div>
    </footer>

</body>
</html>
