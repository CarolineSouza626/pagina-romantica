

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Novo card secreto</h2>
<form method="POST" action="<?php echo e(route('admin.secret-cards.store')); ?>" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?>
    <input class="admin-input" name="title" placeholder="Título" value="<?php echo e(old('title')); ?>">
    <input class="admin-input" name="clue" placeholder="Pista" value="<?php echo e(old('clue')); ?>">
    <textarea class="admin-input min-h-32" name="cipher_text" placeholder="Texto cifrado"><?php echo e(old('cipher_text')); ?></textarea>
    <textarea class="admin-input min-h-32" name="revealed_text" placeholder="Texto revelado"><?php echo e(old('revealed_text')); ?></textarea>
    <input class="admin-input" type="number" name="sort_order" value="<?php echo e(old('sort_order', 0)); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_hidden" class="rounded" checked> escondido</div>
    <button class="emotional-btn" type="submit">salvar card</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\cards\create.blade.php ENDPATH**/ ?>