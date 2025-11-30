<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mengambil Title dari setiap halaman yang memanggil layout ini. Default: 'Aplikasi TBS' -->
    <title>{{ config('app.name', 'Aplikasi TBS') }} - @yield('title')</title>

    <!-- Memanggil CSS (Tailwind CSS dan custom styles) -->
    @include('admin.layouts.admin.css')

    <!-- Section khusus untuk CSS tambahan per halaman -->
    @yield('css')
</head>

{{-- Kunci: body ditata vertikal, setinggi layar penuh. --}}

<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Header (Navbar). Terletak di bagian atas. -->
    @include('admin.layouts.admin.header')

    {{-- KUNCI PERBAIKAN: Div ini mengambil semua sisa tinggi vertikal yang tersisa antara Header dan Footer (flex-1)
       dan menata Sidebar dan Main Content secara horizontal (flex). --}}
    <div class="flex flex-1 min-h-0">


        <!-- Sidebar -->
        @include('admin.layouts.admin.sidebar')

        <!-- Main Content Area. flex-grow agar mengambil sisa ruang horizontal -->
        <main class="flex-grow p-4 md:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>

    <!-- Footer. Diletakkan di bagian paling bawah. -->
    @include('admin.layouts.admin.footer')

    <!-- Memanggil Javascript -->
    @include('admin.layouts.admin.js')
    @yield('js')
</body>

</html>