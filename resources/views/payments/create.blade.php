<x-app-layout>
    <x-slot name="header">
        Form Pembayaran
    </x-slot>

    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-credit-card mr-2 text-blue-500"></i>
                    Form Pembayaran PLN
                </h2>
                <p class="text-gray-500 text-sm mt-1">Isi informasi pembayaran untuk melanjutkan</p>
            </div>

            <form method="POST" action="{{ route('payments.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="meter_number" class="block text-sm font-medium text-gray-700 mb-1">Nomor Meteran <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tachometer-alt text-gray-400"></i>
                            </div>
                            <input type="text" name="meter_number" id="meter_number" value="{{ old('meter_number') }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required placeholder="Masukkan nomor meteran">
                        </div>
                        @error('meter_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kwh_usage" class="block text-sm font-medium text-gray-700 mb-1">Jumlah kWh <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-bolt text-gray-400"></i>
                            </div>
                            <input type="number" name="kwh_usage" id="kwh_usage" value="{{ old('kwh_usage') }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" min="1" required placeholder="Masukkan jumlah kWh">
                        </div>
                        @error('kwh_usage')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="price_per_kwh" class="block text-sm font-medium text-gray-700 mb-1">Harga per kWh (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-tag text-gray-400"></i>
                        </div>
                        <select name="price_per_kwh" id="price_per_kwh" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
                            <option value="1352" {{ old('price_per_kwh') == '1352' ? 'selected' : '' }}>900 VA / 1kWh = Rp. 1.352</option>
                            <option value="1444" {{ old('price_per_kwh') == '1444' ? 'selected' : '' }}>1.300 VA / 1kWh = Rp. 1.444</option>
                            <option value="1699" {{ old('price_per_kwh') == '1699' ? 'selected' : '' }}>3.500 VA / 1kWh = Rp. 1.699</option>
                            <option value="1699" {{ old('price_per_kwh') == '1699' ? 'selected' : '' }}>6.600 VA / 1kWh = Rp. 1.699</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                    </div>
                    @error('price_per_kwh')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Total Tagihan</label>
                    <div class="flex items-center">
                        <div class="text-3xl font-bold text-blue-600" id="total_amount">Rp 0</div>
                        <div class="ml-3 text-blue-500">
                            <i class="fas fa-calculator"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">*Total akan dihitung otomatis berdasarkan kWh dan harga</p>
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location.href='{{ route('home') }}'" class="mr-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Batal
                        </button>
                        <button type="submit" class="inline-flex justify-center items-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-paper-plane mr-2"></i> Proses Pembayaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-6 bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900">Petunjuk Pembayaran</h3>
            </div>
            <div class="space-y-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                            1
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-medium text-gray-900">Masukkan Nomor Meteran</h4>
                        <p class="text-sm text-gray-500">Nomor meteran dapat dilihat pada meteran listrik atau tagihan sebelumnya.</p>
                    </div>
                </div>

                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                            2
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-medium text-gray-900">Masukkan Jumlah kWh</h4>
                        <p class="text-sm text-gray-500">Masukkan jumlah penggunaan listrik dalam kilowatt-hour (kWh).</p>
                    </div>
                </div>

                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                            3
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-medium text-gray-900">Verifikasi Total Tagihan</h4>
                        <p class="text-sm text-gray-500">Periksa total tagihan yang akan dibayarkan.</p>
                    </div>
                </div>

                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                            4
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-medium text-gray-900">Proses Pembayaran</h4>
                        <p class="text-sm text-gray-500">Klik tombol "Proses Pembayaran" untuk melanjutkan dan menerima bukti pembayaran.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kwhInput = document.getElementById('kwh_usage');
            const priceInput = document.getElementById('price_per_kwh');
            const totalDisplay = document.getElementById('total_amount');

            function calculateTotal() {
                const kwh = parseFloat(kwhInput.value) || 0;
                const price = parseFloat(priceInput.value) || 0;
                const total = kwh * price;

                totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID', {maximumFractionDigits: 0});
            }

            kwhInput.addEventListener('input', calculateTotal);
            priceInput.addEventListener('input', calculateTotal);

            // Initial calculation
            calculateTotal();
        });
    </script>
</x-app-layout>
