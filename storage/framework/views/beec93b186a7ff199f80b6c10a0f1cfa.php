

<?php $__env->startSection('title', 'Harga TBS'); ?>

<?php $__env->startSection('content'); ?>
<div class="rounded-xl bg-white shadow-2xl p-6">
    <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-4">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            Data Harga TBS
        </h2>

        <a href="<?php echo e(route('admin.harga.create')); ?>" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl shadow-md transition duration-150 ease-in-out font-medium flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Tambah Harga Baru
        </a>
    </div>

    <?php if(session('success')): ?>
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg" role="alert">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <div class="overflow-x-auto border rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-green-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Harga / Kg</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-green-800 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $hargaTbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-green-50 transition duration-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo e($index + 1); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-700">Rp <?php echo e(number_format($h->harga_perkg, 0, ',', '.')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($h->tanggal)->format('d M Y')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="<?php echo e(route('admin.harga.edit', $h->harga_id)); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-150 mr-3 p-2 rounded-full hover:bg-blue-50" title="Edit Data">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7-5L19 3m0 0l-5 5m5-5v3m0 0h-3"></path>
                            </svg>
                        </a>
                        <form action="<?php echo e(route('admin.harga.delete', $h->harga_id)); ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data harga ini? Tindakan ini tidak dapat dibatalkan.');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 transition duration-150 p-2 rounded-full hover:bg-red-50" title="Hapus Data">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/pages/harga/index.blade.php ENDPATH**/ ?>