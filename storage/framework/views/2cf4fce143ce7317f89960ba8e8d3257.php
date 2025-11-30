

<?php $__env->startSection('content'); ?>
<div class="rounded-xl bg-white shadow-2xl p-6">

    <?php if(session('success')): ?>
    <div id="success-alert" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md transition duration-500 ease-out opacity-100" role="alert">
        <div class="flex items-center justify-between">
            <p class="mb-0 flex items-center font-medium">
                <span class="font-bold mr-1">Berhasil!</span> <?php echo e(session('success')); ?>

            </p>
            <button type="button" class="text-green-700 hover:text-green-900 focus:outline-none" onclick="document.getElementById('success-alert').remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-4">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            Data Hasil Penimbangan TBS
        </h2>

        
        <div class="flex items-center space-x-5">
            <span class="text-xl font-semibold">Total TBS (Kg): <?php echo e($totalTbs); ?></span>
            <span class="text-xl font-semibold">Total Transaksi: <?php echo e($totalTransaksi); ?></span>
        </div>

        
        <a href="<?php echo e(route('admin.timbangan.create')); ?>" class="bg-lime-600 hover:bg-lime-700 text-white px-5 py-2.5 rounded-xl shadow-md transition duration-150 ease-in-out font-medium flex items-center">
            Input Data Baru
        </a>
    </div>

    <?php if($data->isEmpty()): ?>
    <div class="p-6 text-center text-blue-800 bg-blue-50 border border-blue-300 rounded-lg" role="alert">
        <p>Belum ada data timbangan yang tercatat saat ini. Silakan input data baru.</p>
    </div>
    <?php else: ?>
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
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-6 py-4"><?php echo e($row->kode_transaksi); ?></td>
                    <td class="px-6 py-4"><?php echo e($row->tanggal); ?></td>
                    <td class="px-6 py-4"><?php echo e($row->nama_petani); ?></td>
                    <td class="px-6 py-4 text-right"><?php echo e($row->total_tbs); ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            <?php echo e($row->status); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="<?php echo e(route('pages.timbangan.edit', $row->id)); ?>" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="<?php echo e(route('pages.timbangan.destroy', $row->id)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/pages/timbangan/index.blade.php ENDPATH**/ ?>