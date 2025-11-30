@extends('layouts.admin')

@section('content')
<div class="rounded-xl bg-white shadow-2xl p-6">

    @if(session('success'))
    <div id="success-alert" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md transition duration-500 ease-out opacity-100" role="alert">
        <div class="flex items-center justify-between">
            <p class="mb-0 flex items-center font-medium">
                <span class="font-bold mr-1">Berhasil!</span> {{ session('success') }}
            </p>
            <button type="button" class="text-green-700 hover:text-green-900 focus:outline-none" onclick="document.getElementById('success-alert').remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-4">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            Data Hasil Penimbangan TBS
        </h2>

        {{-- Menambahkan Total TBS dan Total Transaksi --}}
        <div class="flex items-center space-x-5">
            <span class="text-xl font-semibold">Total TBS (Kg): {{ $totalTbs }}</span>
            <span class="text-xl font-semibold">Total Transaksi: {{ $totalTransaksi }}</span>
        </div>

        {{-- Tombol Input Data Baru --}}
        <a href="{{ route('admin.timbangan.create') }}" class="bg-lime-600 hover:bg-lime-700 text-white px-5 py-2.5 rounded-xl shadow-md transition duration-150 ease-in-out font-medium flex items-center">
            Input Data Baru
        </a>
    </div>

    @if ($data->isEmpty())
    <div class="p-6 text-center text-blue-800 bg-blue-50 border border-blue-300 rounded-lg" role="alert">
        <p>Belum ada data timbangan yang tercatat saat ini. Silakan input data baru.</p>
    </div>
    @else
    <div class="overflow-x-auto border rounded-lg shadow-inner">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-lime-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">ID Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Petani</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Total TBS (KG)</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Keterangan</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($data as $row)
                <tr>
                    <td class="px-6 py-4">{{ $row->kode_transaksi }}</td>
                    <td class="px-6 py-4">{{ $row->tanggal }}</td>
                    <td class="px-6 py-4">{{ $row->nama_petani }}</td>
                    <td class="px-6 py-4 text-right">{{ $row->total_tbs }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            {{ $row->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('pages.timbangan.edit', $row->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('pages.timbangan.destroy', $row->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection