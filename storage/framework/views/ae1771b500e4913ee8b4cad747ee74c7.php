<div class="sidebar">
    <h4>🌴 Pekerja</h4>

    <a href="<?php echo e(route('tukang.dashboard')); ?>" class="<?php echo e(Request::routeIs('tukang.dashboard') ? 'active' : ''); ?>">
        <i class="bi bi-house-door-fill"></i> <span>Dashboard</span>
    </a>

    <a href="<?php echo e(route('tukang.input')); ?>" class="<?php echo e(Request::routeIs('tukang.input') ? 'active' : ''); ?>">
        <i class="bi bi-plus-square-fill"></i> <span>Input Timbangan</span>
    </a>

    <a href="<?php echo e(route('tukang.data')); ?>" class="<?php echo e(Request::routeIs('tukang.data') ? 'active' : ''); ?>">
        <i class="bi bi-file-earmark-text"></i> <span>Data Timbangan</span>
    </a>

    <a href="<?php echo e(route('auth.logout')); ?>">
        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
    </a>
</div>
<?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/TukangTimbang/partials/sidebar.blade.php ENDPATH**/ ?>