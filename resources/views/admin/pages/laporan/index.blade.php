@extends('layouts.admin.app')

@section('title', 'Laporan')

@push('scripts')
<script>
    // Memastikan ikon Lucide terinisialisasi
    lucide.createIcons();
    console.log('Halaman Laporan siap.');
</script>
@endpush

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center border-b pb-4">
    <i data-lucide="file-text" class="w-7 h-7 mr-3 text-blue-600"></i>
    Generate Laporan Data TBS
</h1>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Kolom Kiri: Form Filter Laporan -->
    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-xl h-fit">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Parameter Laporan</h2>
        <form action="#" method="GET" class="space-y-4">
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Laporan</label>
                <select name="jenis" id="jenis" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option>Laporan Harian Timbangan</option>
                    <option>Laporan Bulanan Pembelian</option>
                    <option>Laporan Ringkasan Harga</option>
                    <option>Laporan Data Pengguna</option>
                </select>
            </div>
            <div>
                <label for="periode_mulai" class="block text-sm font-medium text-gray-700 mb-1">Periode Mulai</label>
                <input type="date" name="periode_mulai" id="periode_mulai" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="periode_akhir" class="block text-sm font-medium text-gray-700 mb-1">Periode Akhir</label>
                <input type="date" name="periode_akhir" id="periode_akhir" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                <i data-lucide="download" class="w-5 h-5 inline-block mr-2"></i> GENERATE DAN UNDUH
            </button>
        </form>
    </div>

    <!-- Kolom Kanan: Status Laporan -->
    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-xl">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Riwayat Unduhan Laporan</h2>
        <p class="text-gray-600 mb-4">Laporan yang telah digenerate akan muncul di sini dan siap diunduh. (Contoh data di bawah)</p>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Laporan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Format</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Laporan Bulanan Pembelian</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Okt 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">PDF</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-medium">Unduh</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Laporan Harian Timbangan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">18 Nov 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">Excel</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Memproses</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <a href="#" class="text-gray-400 cursor-not-allowed">Unduh</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection