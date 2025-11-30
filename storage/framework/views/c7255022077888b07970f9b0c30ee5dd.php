<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Timbangan - Web Sawit</title>

    <!-- CSS Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f0f8f0; }

        /* --- SIDEBAR --- */
        .sidebar {
            height: 100vh; width: 260px; position: fixed; top: 0; left: 0;
            background: linear-gradient(180deg, #3ca374 0%, #2e7d57 100%);
            color: white; padding-top: 2rem; z-index: 1000;
            display: flex; flex-direction: column;
        }
        .sidebar h4 { text-align: center; margin-bottom: 2rem; font-weight: 700; }
        .sidebar a {
            color: white; text-decoration: none; padding: 15px 25px; display: flex; align-items: center; gap: 10px;
            margin: 5px 15px; border-radius: 10px; transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.2); }
        .sidebar a i { font-size: 1.2rem; }

        .main-content { margin-left: 260px; padding: 30px; }

        /* --- TABLE STYLE --- */
        .table-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .table thead { background: linear-gradient(90deg, #3ca374, #2e7d57); color: white; }

        /* --- FILTER CARD --- */
        .filter-card {
            background-color: #fff; border-radius: 15px; padding: 20px; margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02); border: 1px solid #f0f0f0;
        }

        /* Responsive Mobile */
        @media(max-width:768px){
            .sidebar { width: 70px; padding-top: 1rem; }
            .sidebar h4, .sidebar span { display: none; }
            .sidebar a { justify-content: center; padding: 10px; }
            .main-content { margin-left: 70px; padding: 15px; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>🌴 Pekerja</h4>
        <a href="<?php echo e(route('tukang.dashboard')); ?>"><i class="bi bi-house-door-fill"></i> <span>Dashboard</span></a>
        <a href="<?php echo e(route('tukang.input')); ?>"><i class="bi bi-plus-square-fill"></i> <span>Input Timbangan</span></a>

        <!-- MENU AKTIF -->
        <a href="#" class="active"><i class="bi bi-file-earmark-text"></i> <span>Data Timbangan</span></a>

        <a href="<?php echo e(route('auth.logout')); ?>"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
    </div>

    <!-- CONTENT -->
    <div class="main-content">
        <h2 class="fw-bold text-success mb-4"><i class="bi bi-bar-chart-line-fill"></i> Data Timbangan</h2>

        <!-- FILTER DATA (Form Pencarian) -->
        <div class="card filter-card">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-search"></i> Filter Data</h5>
            <form action="<?php echo e(route('tukang.data')); ?>" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label small text-muted">Dari Tanggal</label>
                        <input type="date" name="tgl_awal" class="form-control" value="<?php echo e(request('tgl_awal')); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small text-muted">Sampai Tanggal</label>
                        <input type="date" name="tgl_akhir" class="form-control" value="<?php echo e(request('tgl_akhir')); ?>">
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100 fw-bold" style="background-color: #0d6efd; border: none;">
                            <i class="bi bi-filter"></i> Cari
                        </button>
                        <a href="<?php echo e(route('tukang.data')); ?>" class="btn btn-secondary"><i class="bi bi-arrow-counterclockwise"></i></a>
                    </div>
                </div>
            </form>
        </div>

        <!-- INFO KARTU (FULL WIDTH: col-md-6) -->
        <div class="row mb-4">
            <!-- Kartu Hijau -->
            <div class="col-md-6">
                <div class="card text-white p-4 border-0 rounded-4 shadow-sm h-100" style="background-color: #198754;">
                    <h6 class="mb-2">Total Berat (Sesuai Filter)</h6>
                    <h1 class="fw-bold m-0"><?php echo e($dataTimbangan->sum('berat')); ?> Kg</h1>
                </div>
            </div>
            <!-- Kartu Kuning -->
            <div class="col-md-6">
                <div class="card text-dark p-4 border-0 rounded-4 shadow-sm h-100" style="background-color: #ffc107;">
                    <h6 class="mb-2">Total Transaksi</h6>
                    <h1 class="fw-bold m-0"><?php echo e($dataTimbangan->count()); ?></h1>
                </div>
            </div>
        </div>

        <!-- TABEL ARSIP LENGKAP -->
        <div class="card table-card">
            <div class="mb-3">
                <h5 class="fw-bold text-secondary mb-0">Arsip Semua Data</h5>
                <!-- Tombol Cetak SUDAH DIHAPUS -->
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle table-bordered">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Input</th>
                            <th>Nama Petani</th>
                            <th>Berat (Kg)</th>
                            <th>Keterangan</th>
                            <!-- Kolom Aksi SUDAH DIHAPUS -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $dataTimbangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-bold text-center">#<?php echo e($data->id); ?></td>
                            <td><?php echo e($data->created_at->format('d M Y, H:i')); ?></td>
                            <td><?php echo e($data->nama_petani); ?></td>
                            <td class="fw-bold"><?php echo e($data->berat); ?></td>
                            <td><?php echo e($data->keterangan ?? '-'); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data sama sekali.</td></tr>
                        <?php endif; ?>

                        <!-- Grand Total di Bawah Tabel -->
                        <?php if($dataTimbangan->count() > 0): ?>
                        <tr class="fw-bold table-light">
                            <td colspan="3" class="text-end">GRAND TOTAL:</td>
                            <td><?php echo e($dataTimbangan->sum('berat')); ?> Kg</td>
                            <td></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="mt-5 pt-4 border-top text-center text-secondary">
            <p class="mb-1">&copy; <?php echo e(date('Y')); ?> <strong>Web Sawit</strong>. All Rights Reserved.</p>
            <small>Sistem Pencatatan Timbangan Digital</small>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/TukangTimbang/data-timbangan.blade.php ENDPATH**/ ?>