

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Editar card secreto</h2>
<form method="POST" action="<?php echo e(route('admin.secret-cards.update', $card)); ?>" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <input class="admin-input" name="title" value="<?php echo e(old('title', $card->title)); ?>">
    <input class="admin-input" name="clue" value="<?php echo e(old('clue', $card->clue)); ?>">
    <textarea class="admin-input min-h-32" name="cipher_text"><?php echo e(old('cipher_text', $card->cipher_text)); ?></textarea>
    <textarea class="admin-input min-h-32" name="revealed_text"><?php echo e(old('revealed_text', $card->revealed_text)); ?></textarea>
    <input class="admin-input" type="number" name="sort_order" value="<?php echo e(old('sort_order', $card->sort_order)); ?>">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_hidden" class="rounded" <?php if($card->is_hidden): echo 'checked'; endif; ?>> escondido</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\cards\edit.blade.php ENDPATH**/ ?>