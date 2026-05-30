

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Momento da história</h2>
<form method="POST" action="<?php echo e($event->exists ? route('admin.timeline-events.update', $event) : route('admin.timeline-events.store')); ?>" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?>
    <?php if($event->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
    <input class="admin-input" name="title" placeholder="Título" value="<?php echo e(old('title', $event->title)); ?>">
    <input class="admin-input" name="icon" placeholder="Ícone" value="<?php echo e(old('icon', $event->icon)); ?>">
    <textarea class="admin-input min-h-40" name="description" placeholder="Descrição"><?php echo e(old('description', $event->description)); ?></textarea>
    <input class="admin-input" type="date" name="happened_at" value="<?php echo e(old('happened_at', optional($event->happened_at)->format('Y-m-d'))); ?>">
    <input class="admin-input" type="number" name="sort_order" value="<?php echo e(old('sort_order', $event->sort_order)); ?>">
    <button class="emotional-btn" type="submit">salvar momento</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\settings\timeline-form.blade.php ENDPATH**/ ?>