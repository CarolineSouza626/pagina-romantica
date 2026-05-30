

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Nova música</h2>
<form method="POST" action="<?php echo e(route('admin.songs.store')); ?>" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?>
    <input class="admin-input" name="title" placeholder="Título" value="<?php echo e(old('title')); ?>">
    <input class="admin-input" name="artist" placeholder="Artista" value="<?php echo e(old('artist')); ?>">
    <input class="admin-input" type="file" name="audio" accept="audio/*">
    <input class="admin-input" type="file" name="cover" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    <input class="admin-input" type="number" name="duration_seconds" placeholder="Duração em segundos" value="<?php echo e(old('duration_seconds')); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" checked> ativa</div>
    <button class="emotional-btn" type="submit">salvar música</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\songs\create.blade.php ENDPATH**/ ?>