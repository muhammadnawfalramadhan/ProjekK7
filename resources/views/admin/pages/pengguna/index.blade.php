@extends('layouts.admin.app')

@section('title', 'Data Pengguna')

@push('scripts')
<script>
    // Memastikan ikon Lucide terinisialisasi
    lucide.createIcons();

    // Logic Delete (Jika ada CRUD Pengguna)
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-pengguna-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const message = "Yakin ingin menghapus data pengguna ini? Aksi ini tidak dapat dibatalkan.";
                if (!window.confirm(message)) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endpush

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center border-b pb-4">
    <i data-lucide="users" class="w-7 h-7 mr-3 text-green-700"></i>
    Manajemen Data Pengguna (Staf)
</h1>

<div class="bg-white p-6 rounded-xl shadow-xl">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Akun Staf</h2>
        {{-- Tombol Tambah Pengguna --}}
        <button class="bg-green-600 text-white p-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition">
            <i data-lucide="user-plus" class="w-4 h-4 inline-block mr-1"></i> Tambah Pengguna Baru
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-green-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{-- Data Dummy Pengguna --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Bambang Wijaya</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">bambangtbs</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Tukang Timbang</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Aktif</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Citra Dewi</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">citrabendahara</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Bendahara</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Aktif</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection