

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Editar música</h2>
<form method="POST" action="<?php echo e(route('admin.songs.update', $song)); ?>" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <input class="admin-input" name="title" value="<?php echo e(old('title', $song->title)); ?>">
    <input class="admin-input" name="artist" value="<?php echo e(old('artist', $song->artist)); ?>">
    <input class="admin-input" type="file" name="audio" accept="audio/*">
    <input class="admin-input" type="file" name="cover" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    <input class="admin-input" type="number" name="duration_seconds" value="<?php echo e(old('duration_seconds', $song->duration_seconds)); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" <?php if($song->is_active): echo 'checked'; endif; ?>> ativa</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\songs\edit.blade.php ENDPATH**/ ?>