<!-- Top Header/Navbar -->
<header class="flex items-center justify-between p-5 bg-white border-b border-gray-200 shadow-md">
    <!-- Tombol Toggle Sidebar (Hanya di Mobile) -->
    <button id="sidebar-toggle" class="md:hidden text-gray-600 hover:text-[#166534] focus:outline-none">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
    <h2 class="text-2xl font-bold text-gray-800">Management Data TBS pada RAM Kelapa Sawit</h2>
    <!-- Header Kanan (Profil Pengguna) -->
    <div class="flex items-center space-x-3">
        <span class="font-semibold text-gray-700">
            Halo, {{ session('username') }}👋
        </span>
        <div
            class="w-8 h-8 bg-green-800 text-white flex items-center justify-center rounded-full font-bold uppercase">
            {{ substr(session('username'), 0, 2) }}
        </div>
    </div>
</header>