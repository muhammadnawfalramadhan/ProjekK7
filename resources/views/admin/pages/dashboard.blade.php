@extends('admin.layouts.admin.app') {{-- 🔑 MENGAMBIL PARTIAL VIEW DARI MASTER LAYOUT APP.BLADE.PHP --}}

@section('title', 'Dashboard')

@push('scripts')
<script>
    // Memastikan ikon di konten ini terinisialisasi
    lucide.createIcons();
</script>

{{-- Mengambil Chart.js dari @push('scripts') --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
{{-- Tambahkan logic Chart.js di sini jika ada data --}}
<script>
    // KODE JAVASCRIPT SPESIFIK DASHBOARD
</script>
@endpush

@section('content')
<!-- Banner Sambutan dan Deskripsi Singkat -->
<div
    class="bg-gradient-to-r from-[#86efac] to-[#34d399] p-6 sm:p-8 rounded-xl shadow-lg mb-8 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10"
        style="background-image: url('https://placehold.co/800x200/ffffff/000?text=Palm+Pattern'); background-size: cover;">
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold text-[#065f46] relative z-10">
        Selamat Datang di Website Manajemen Data TBS
    </h1>
    <p class="mt-2 text-[#065f46] text-lg relative z-10 font-medium">
        Platform terpusat untuk mengelola seluruh data Tandan Buah Segar, mulai dari harga harian, data
        timbangan, hingga administrasi pengguna.
    </p>
    <p class="mt-1 text-[#065f46] text-sm relative z-10">
        Gunakan menu di samping untuk navigasi.
    </p>
</div>

<h2 class="text-2xl font-semibold text-gray-800 mb-6">Ringkasan Kinerja (Hari Ini)</h2>

<!-- Grid Kartu Statistik -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
    <!-- Kartu 1: Total TBS -->
    <div
        class="bg-white p-6 rounded-xl shadow-xl border-b-4 border-lime-500 hover:shadow-2xl transition duration-300">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-500">Total TBS (Kg)</p>
            <i data-lucide="box" class="w-6 h-6 text-lime-600"></i>
        </div>
        <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $totalTBS ?? '0' }}</p>
        <p class="text-sm text-lime-600 mt-1 font-medium">↑ Data Timbangan Hari Ini</p>
    </div>

    <!-- Kartu 2: Total Petani -->
    <div
        class="bg-white p-6 rounded-xl shadow-xl border-b-4 border-green-700 hover:shadow-2xl transition duration-300">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-500">Total Petani</p>
            <i data-lucide="user-check" class="w-6 h-6 text-green-700"></i>
        </div>
        <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $totalPetani ?? '0' }}</p>
        <p class="text-sm text-green-700 mt-1 font-medium">👥 Terdaftar di Sistem</p>
    </div>

    <!-- Kartu 3: Harga Hari Ini -->
    <div
        class="bg-white p-6 rounded-xl shadow-xl border-b-4 border-yellow-500 hover:shadow-2xl transition duration-300">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-500">Harga TBS / Kg</p>
            <i data-lucide="trending-up" class="w-6 h-6 text-yellow-600"></i>
        </div>
        <p class="text-4xl font-extrabold text-gray-900 mt-2">Rp
            {{ $hargaHariIni ?? '0' }}
        </p>
        <p class="text-sm text-red-500 mt-1 font-medium">↓ Fluktuasi Harian</p>
    </div>
</div>

<!-- Bagian Visualisasi Utama (Grafik) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
    <!-- Kolom Kiri: Area Grafik -->
    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-xl">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <i data-lucide="bar-chart-2" class="w-5 h-5 mr-2 text-lime-600"></i>
            Grafik Penimbangan Mingguan
        </h3>
        <div class="w-full h-80 flex items-center justify-center text-gray-400 font-medium border border-dashed rounded-lg">
            Data grafik akan muncul di sini setelah terhubung ke database.
            <canvas id="timbanganChart" class="hidden"></canvas>
        </div>
    </div>

    <!-- Kolom Kanan: Aksi Cepat -->
    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-xl flex flex-col">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <i data-lucide="zap" class="w-5 h-5 mr-2 text-orange-500"></i>
            Aksi Cepat
        </h3>
        <div class="space-y-3 flex-1">
            <a href="{{ route('admin.harga.create') }}"
                class="block bg-green-500 text-white p-3 rounded-lg text-center font-semibold hover:bg-green-600 transition shadow-md">
                Input Harga TBS Baru
            </a>
            <a href="{{ route('admin.timbangan.index') }}"
                class="block bg-yellow-500 text-gray-800 p-3 rounded-lg text-center font-semibold hover:bg-yellow-600 transition shadow-md">
                Konfirmasi Timbangan
            </a>
            <a href="{{ route('admin.laporan.index') }}"
                class="block bg-blue-500 text-white p-3 rounded-lg text-center font-semibold hover:bg-blue-600 transition shadow-md">
                Unduh Laporan Hari Ini
            </a>
        </div>
    </div>
</div>

<!-- Deskripsi Singkat Semua Menu -->
<h2 class="text-2xl font-semibold text-gray-800 mb-6 border-t pt-8">Eksplorasi Menu Utama</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Menu 1: Harga TBS -->
    <a href="{{ route('admin.harga.index') }}" class="block bg-white p-6 rounded-xl shadow-xl border-l-4 border-yellow-500 hover:shadow-2xl transition duration-300">
        <div class="flex items-center mb-3">
            <i data-lucide="dollar-sign" class="w-6 h-6 mr-3 text-yellow-600"></i>
            <h3 class="text-lg font-bold text-gray-800">Harga TBS</h3>
        </div>
        <p class="text-sm text-gray-600">Kelola dan perbarui harga pembelian Tandan Buah Segar (TBS) secara
            harian. Penting untuk memastikan transparansi harga kepada petani.</p>
    </a>

    <!-- Menu 2: Data Timbangan -->
    <a href="{{ route('admin.timbangan.index') }}" class="block bg-white p-6 rounded-xl shadow-xl border-l-4 border-lime-500 hover:shadow-2xl transition duration-300">
        <div class="flex items-center mb-3">
            <i data-lucide="scale" class="w-6 h-6 mr-3 text-lime-600"></i>
            <h3 class="text-lg font-bold text-gray-800">Data Timbangan</h3>
        </div>
        <p class="text-sm text-gray-600">Lihat, edit, hapus, dan konfirmasi semua data hasil penimbangan
            yang diinput oleh Tukang Timbang. Pusat kontrol data transaksi TBS.</p>
    </a>

    <!-- Menu 3: Data Pengguna -->
    <a href="{{ route('admin.pengguna.index') }}" class="block bg-white p-6 rounded-xl shadow-xl border-l-4 border-green-700 hover:shadow-2xl transition duration-300">
        <div class="flex items-center mb-3">
            <i data-lucide="users" class="w-6 h-6 mr-3 text-green-700"></i>
            <h3 class="text-lg font-bold text-gray-800">Data Pengguna</h3>
        </div>
        <p class="text-sm text-gray-600">Manajemen akun untuk staf Anda (Tukang Timbang dan Bendahara).
            Tambah, hapus, atau ubah peran akses pengguna sistem.</p>
    </a>

    <!-- Menu 4: Laporan -->
    <a href="{{ route('admin.laporan.index') }}" class="block bg-white p-6 rounded-xl shadow-xl border-l-4 border-blue-500 hover:shadow-2xl transition duration-300">
        <div class="flex items-center mb-3">
            <i data-lucide="file-text" class="w-6 h-6 mr-3 text-blue-600"></i>
            <h3 class="text-lg font-bold text-gray-800">Laporan</h3>
        </div>
        <p class="text-sm text-gray-600">Buat rekapitulasi data penimbangan dan keuangan per hari atau per
            bulan. Fasilitas ekspor ke format Excel atau PDF tersedia.</p>
    </a>
</div>
@endsection