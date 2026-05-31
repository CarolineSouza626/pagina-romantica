

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Fotos</h2>
    <a class="emotional-btn" href="<?php echo e(route('admin.photos.create')); ?>">nova foto</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $photoPath = $photo->image_path;
            $photoUrl = $photo->image_url
                ? (str_starts_with($photo->image_url, 'http') ? $photo->image_url : url($photo->image_url))
                : Storage::url($photoPath);
        ?>
        <div class="paper-card overflow-hidden p-4">
            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-[linear-gradient(180deg,rgba(255,255,255,0.96),rgba(249,239,232,0.85))]">
                <div id="photo-fallback-<?php echo e($photo->id); ?>" class="absolute inset-0 flex items-center justify-center px-6 text-center text-sm text-ink/60">
                    <div>
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-white/80 text-xl text-rosewood shadow-sm">◌</div>
                        <p class="mt-4 font-medium text-ink/70">Imagem indisponível</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.28em] text-rosewood/50"><?php echo e($photo->title); ?></p>
                    </div>
                </div>
                <?php if($photoPath): ?>
                    <img
                        src="<?php echo e($photoUrl); ?>"
                        class="absolute inset-0 h-full w-full object-cover"
                        alt="<?php echo e($photo->title); ?>"
                        onload="document.getElementById('photo-fallback-<?php echo e($photo->id); ?>').style.display='none';"
                        onerror="this.style.display='none';document.getElementById('photo-fallback-<?php echo e($photo->id); ?>').style.display='flex';"
                    >
                <?php endif; ?>
            </div>
            <h3 class="mt-4 font-medium"><?php echo e($photo->title); ?></h3>
            <p class="mt-1 text-sm text-ink/70"><?php echo e($photo->caption); ?></p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="<?php echo e(route('admin.photos.edit', $photo)); ?>">editar</a>
                <form method="POST" action="<?php echo e(route('admin.photos.destroy', $photo)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="secondary-btn" type="submit">remover</button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Nova pasta\pagina-romantica\resources\views/admin/photos/index.blade.php ENDPATH**/ ?>