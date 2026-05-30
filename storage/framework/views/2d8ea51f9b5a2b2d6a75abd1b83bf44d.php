

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Editar motivo</h2>
<form method="POST" action="<?php echo e(route('admin.love-messages.update', $message)); ?>" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <input class="admin-input" name="title" value="<?php echo e(old('title', $message->title)); ?>">
    <input class="admin-input" name="subtitle" value="<?php echo e(old('subtitle', $message->subtitle)); ?>">
    <textarea class="admin-input min-h-40" name="body"><?php echo e(old('body', $message->body)); ?></textarea>
    <input class="admin-input" type="number" name="sort_order" value="<?php echo e(old('sort_order', $message->sort_order)); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" <?php if($message->is_active): echo 'checked'; endif; ?>> ativo</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\messages\edit.blade.php ENDPATH**/ ?>