<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('TukangTimbang.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>

    <?php echo $__env->make('TukangTimbang.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-4 rounded-3 shadow-sm">
            <div>
                <h2 class="fw-bold text-success">Dashboard</h2>
                <p class="text-muted mb-0">Halo, <?php echo e($username); ?>! Selamat bekerja.</p>
            </div>
            <i class="bi bi-speedometer2 fs-1 text-success"></i>
        </div>

        <!-- Statistik Hari Ini -->
        <div class="row mb-4">
            <!-- Kiri: Transaksi (Kuning) -->
            <div class="col-md-6">
                <div class="card text-dark p-4 border-0 rounded-4 shadow-sm h-100" style="background: #ffc107;">
                    <h5>Transaksi Hari Ini</h5>
                    <h1 class="fw-bold display-4 mb-0"><?php echo e($dataHariIni->count()); ?></h1>
                </div>
            </div>

            <!-- Kanan: Berat (Hijau) -->
            <div class="col-md-6">
                <div class="card text-white p-4 border-0 rounded-4 shadow-sm h-100" style="background: #2e7d57;">
                    <h5>Total Berat Hari Ini</h5>
                    <h1 class="fw-bold display-4 mb-0"><?php echo e($dataHariIni->sum('berat')); ?> <span class="fs-4">Kg</span></h1>
                </div>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
            <h5 class="mb-3 text-secondary"><i class="bi bi-clock-history"></i> 5 Transaksi Terakhir</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Waktu</th>
                            <th>Petani</th>
                            <th>Berat</th>
                            <th>Keterangan</th> <!-- SUDAH DIGANTI -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $dataTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($data->created_at->format('H:i')); ?></td>
                            <td><?php echo e($data->nama_petani); ?></td>
                            <td class="fw-bold"><?php echo e($data->berat); ?> Kg</td>
                            <td><?php echo e($data->keterangan ?? '-'); ?></td> <!-- SUDAH DIGANTI -->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada aktivitas hari ini.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $__env->make('TukangTimbang.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</body>
</html>
<?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/TukangTimbang/login-tukangtimbangsukses.blade.php ENDPATH**/ ?>