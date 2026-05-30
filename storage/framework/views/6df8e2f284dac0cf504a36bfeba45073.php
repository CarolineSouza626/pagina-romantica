

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Linha do tempo</h2>
    <a class="emotional-btn" href="<?php echo e(route('admin.timeline-events.create')); ?>">novo momento</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="paper-card p-5">
            <p class="text-xs uppercase tracking-[0.3em] text-rosewood/55"><?php echo e($event->happened_at?->format('d/m/Y')); ?></p>
            <p class="mt-2 text-lg font-medium"><?php echo e($event->icon); ?> <?php echo e($event->title); ?></p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="<?php echo e(route('admin.timeline-events.edit', $event)); ?>">editar</a>
                <form method="POST" action="<?php echo e(route('admin.timeline-events.destroy', $event)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="secondary-btn">remover</button></form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\settings\timeline-index.blade.php ENDPATH**/ ?>