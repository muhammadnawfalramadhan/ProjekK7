<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Mengambil Title dari setiap halaman yang memanggil layout ini. Default: 'Aplikasi TBS' -->
    <title><?php echo e(config('app.name', 'Aplikasi TBS')); ?> - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Memanggil CSS (Tailwind CSS dan custom styles) -->
    <?php echo $__env->make('admin.layouts.admin.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Section khusus untuk CSS tambahan per halaman -->
    <?php echo $__env->yieldContent('css'); ?>
</head>



<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Header (Navbar). Terletak di bagian atas. -->
    <?php echo $__env->make('admin.layouts.admin.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="flex flex-1 min-h-0">


        <!-- Sidebar -->
        <?php echo $__env->make('admin.layouts.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Main Content Area. flex-grow agar mengambil sisa ruang horizontal -->
        <main class="flex-grow p-4 md:p-6 lg:p-8">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Footer. Diletakkan di bagian paling bawah. -->
    <?php echo $__env->make('admin.layouts.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Memanggil Javascript -->
    <?php echo $__env->make('admin.layouts.admin.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/layouts/admin/app.blade.php ENDPATH**/ ?>