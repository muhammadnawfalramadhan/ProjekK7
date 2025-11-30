<!-- Sidebar / Menu Samping (Warna Hijau Sawit) -->
<aside id="sidebar"
    class="flex-shrink-0 w-64 bg-[#14532d] text-white min-h-screen z-20
           md:static 
           transform -translate-x-full md:translate-x-0 
           transition-transform duration-300 ease-in-out shadow-xl">

    <div class="p-6 h-full flex flex-col justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-[#fde047] text-center border-b border-gray-600/50 pb-4 mb-6">
                🌴 TBS Admin
            </h1>

            <nav class="space-y-2">
                <a href="<?php echo e(route('admin.pages.dashboard')); ?>"
                    class="sidebar-link p-3 rounded-xl transition duration-150 <?php if(request()->routeIs('admin.dashboard')): ?> active <?php endif; ?>">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> <span>Dashboard</span>
                </a>

                <a href="<?php echo e(route('admin.harga.index')); ?>"
                    class="sidebar-link p-3 rounded-xl transition duration-150 <?php if(request()->routeIs('admin.hargatbs.*')): ?> active <?php endif; ?>">
                    <i data-lucide="dollar-sign" class="w-5 h-5 mr-3"></i> <span>Harga TBS</span>
                </a>

                <a href="<?php echo e(route('admin.timbangan.index')); ?>"
                    class="sidebar-link p-3 rounded-xl transition duration-150 <?php if(request()->routeIs('admin.datatimbangan.*')): ?> active <?php endif; ?>">
                    <i data-lucide="scale" class="w-5 h-5 mr-3"></i> <span>Data Timbangan</span>
                </a>

                <a href="<?php echo e(route('admin.pengguna.index')); ?>"
                    class="sidebar-link p-3 rounded-xl transition duration-150 <?php if(request()->routeIs('admin.datapengguna.*')): ?> active <?php endif; ?>">
                    <i data-lucide="users" class="w-5 h-5 mr-3"></i> <span>Data Pengguna</span>
                </a>

                <a href="<?php echo e(route('admin.laporan.index')); ?>"
                    class="sidebar-link p-3 rounded-xl transition duration-150 <?php if(request()->routeIs('admin.laporan.index')): ?> active <?php endif; ?>">
                    <i data-lucide="file-text" class="w-5 h-5 mr-3"></i> <span>Laporan</span>
                </a>
            </nav>
        </div>

        <div class="pt-4 border-t border-gray-600/50">
            <a href="<?php echo e(route('auth.logout')); ?>"
                class="sidebar-link p-3 rounded-xl text-red-300 hover:bg-red-700 transition duration-150">
                <i data-lucide="log-out" class="w-5 h-5 mr-3"></i> <span>Logout</span>
            </a>
        </div>
    </div>
</aside><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/layouts/admin/sidebar.blade.php ENDPATH**/ ?>