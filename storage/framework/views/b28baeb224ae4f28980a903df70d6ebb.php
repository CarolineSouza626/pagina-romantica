

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Músicas</h2>
    <a class="emotional-btn" href="<?php echo e(route('admin.songs.create')); ?>">nova música</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="paper-card p-5">
            <p class="text-lg font-medium"><?php echo e($song->title); ?></p>
            <p class="text-sm text-ink/70"><?php echo e($song->artist); ?></p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="<?php echo e(route('admin.songs.edit', $song)); ?>">editar</a>
                <form method="POST" action="<?php echo e(route('admin.songs.destroy', $song)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="secondary-btn">remover</button></form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\songs\index.blade.php ENDPATH**/ ?>