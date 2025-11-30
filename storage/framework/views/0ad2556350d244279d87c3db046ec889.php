<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('TukangTimbang.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>

    <?php echo $__env->make('TukangTimbang.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main-content">
        <h2 class="fw-bold text-success mb-4">⚖️ Input Timbangan Baru</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
            <form action="<?php echo e(route('timbangan.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Petani</label>
                    <input type="text" name="nama_petani" class="form-control form-control-lg" placeholder="Masukkan nama..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Berat Sawit (Kg)</label>
                    <div class="input-group">
                        <input type="number" name="berat" class="form-control form-control-lg" placeholder="0" step="0.1" required>
                        <span class="input-group-text fw-bold">Kg</span>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Keterangan (Opsional)</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Contoh: Kondisi buah, Plat nomor..."></textarea>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg fw-bold shadow-sm" style="background: #2e7d57;">
                        <i class="bi bi-save"></i> SIMPAN DATA
                    </button>

                    <button type="reset" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-eraser"></i> Bersihkan Form
                    </button>
                </div>
            </form>
        </div>

        <?php echo $__env->make('TukangTimbang.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</body>
</html>
<?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/TukangTimbang/input-timbangan.blade.php ENDPATH**/ ?>