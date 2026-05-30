

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Novo motivo</h2>
<form method="POST" action="<?php echo e(route('admin.love-messages.store')); ?>" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?>
    <input class="admin-input" name="title" placeholder="Título" value="<?php echo e(old('title')); ?>">
    <input class="admin-input" name="subtitle" placeholder="Subtítulo" value="<?php echo e(old('subtitle')); ?>">
    <textarea class="admin-input min-h-40" name="body" placeholder="Texto"><?php echo e(old('body')); ?></textarea>
    <input class="admin-input" type="number" name="sort_order" value="<?php echo e(old('sort_order', 0)); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" checked> ativo</div>
    <button class="emotional-btn" type="submit">salvar motivo</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\messages\create.blade.php ENDPATH**/ ?>