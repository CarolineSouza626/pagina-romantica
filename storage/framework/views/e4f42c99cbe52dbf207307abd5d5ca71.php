

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Nova foto</h2>
<form method="POST" action="<?php echo e(route('admin.photos.store')); ?>" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?>
    <div>
        <label class="admin-label">Título</label>
        <input class="admin-input" name="title" value="<?php echo e(old('title')); ?>">
    </div>
    <div>
        <label class="admin-label">Legenda</label>
        <input class="admin-input" name="caption" value="<?php echo e(old('caption')); ?>">
    </div>
    <div>
        <label class="admin-label">Imagem</label>
        <input class="admin-input" type="file" name="image" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    </div>
    <div class="grid gap-4 md:grid-cols-3">
        <input class="admin-input" type="number" name="sort_order" placeholder="ordem" value="<?php echo e(old('sort_order', 0)); ?>">
        <input class="admin-input" type="date" name="taken_at" value="<?php echo e(old('taken_at')); ?>">
        <label class="flex items-center gap-2 pt-3 text-sm"><input type="checkbox" name="is_featured" class="rounded"> destaque</label>
    </div>
    <button class="emotional-btn" type="submit">salvar foto</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\photos\create.blade.php ENDPATH**/ ?>