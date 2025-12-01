

<?php $__env->startSection('title', 'Edit Harga TBS'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-center py-8 px-4">
    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-2xl border-l-4 border-green-700">

        <h2 class="text-3xl font-bold mb-6 text-green-800 flex items-center justify-center">
            <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
            </svg>
            Edit Harga TBS
        </h2>
        <hr class="mb-6 border-green-300">

        <form action="<?php echo e(route('admin.harga.update', $hargaTbs->harga_id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 gap-6">
                <label class="block">
                    <span class="text-gray-700 font-semibold mb-1 block">Harga per Kg (Rp)</span>
                    <input type="number" name="harga_perkg" value="<?php echo e(old('harga_perkg', $hargaTbs->harga_perkg)); ?>"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-600 focus:ring focus:ring-green-600 focus:ring-opacity-50 transition duration-150 ease-in-out p-3"
                        placeholder="contoh: 2500" step="1" min="0" required>
                    <?php $__errorArgs = ['harga_perkg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-sm text-red-600 mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </label>

                <label class="block">
                    <span class="text-gray-700 font-semibold mb-1 block">Tanggal</span>
                    <input type="date" name="tanggal" value="<?php echo e(old('tanggal', $hargaTbs->tanggal ? \Carbon\Carbon::parse($hargaTbs->tanggal)->format('Y-m-d') : '')); ?>"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-600 focus:ring focus:ring-green-600 focus:ring-opacity-50 transition duration-150 ease-in-out p-3"
                        required>
                    <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-sm text-red-600 mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </label>

                <div class="flex items-center gap-3 mt-4 justify-end">
                    <a href="<?php echo e(route('admin.harga.index')); ?>" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out font-medium">
                        Batal
                    </a>
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition duration-150 ease-in-out font-medium">
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/pages/harga/edit.blade.php ENDPATH**/ ?>