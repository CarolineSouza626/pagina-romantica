<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['photo']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['photo']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<article class="site-gallery__card">
    <?php
        $photoPath = $photo->image_path;
        $photoUrl = $photo->image_url
            ? (str_starts_with($photo->image_url, 'http') ? $photo->image_url : url($photo->image_url))
            : Storage::url($photoPath);
    ?>
    <div style="position: relative; aspect-ratio: 4 / 5; overflow: hidden; border-radius: 1.25rem; background: linear-gradient(180deg, rgba(255,255,255,0.92), rgba(249,239,232,0.82));">
        <div id="site-photo-fallback-<?php echo e($photo->id); ?>" style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; text-align: center; padding: 1.5rem; color: rgba(44, 33, 29, 0.6);">
            <div>
                <div style="margin: 0 auto; width: 3.5rem; height: 3.5rem; border-radius: 999px; background: rgba(255,255,255,0.82); display: flex; align-items: center; justify-content: center; color: #9a4f5e; box-shadow: 0 8px 22px rgba(92, 58, 46, 0.10);">◌</div>
                <p style="margin: 1rem 0 0; font-weight: 600;">Imagem indisponível</p>
                <p style="margin: 0.35rem 0 0; font-size: 0.72rem; letter-spacing: 0.28em; text-transform: uppercase; color: rgba(154, 79, 94, 0.55);"><?php echo e($photo->title); ?></p>
            </div>
        </div>
        <?php if($photoPath): ?>
            <img src="<?php echo e($photoUrl); ?>" alt="<?php echo e($photo->title); ?>" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: block;" onload="document.getElementById('site-photo-fallback-<?php echo e($photo->id); ?>').style.display='none';" onerror="this.style.display='none';document.getElementById('site-photo-fallback-<?php echo e($photo->id); ?>').style.display='flex';">
        <?php endif; ?>
    </div>
    <div style="padding-top: 1rem;">
        <h3 class="site-panel__title" style="font-size: 1.2rem;"><?php echo e($photo->title); ?></h3>
        <?php if($photo->caption): ?>
            <p class="site-copy" style="margin-top: 0.45rem;"><?php echo e($photo->caption); ?></p>
        <?php endif; ?>
    </div>
</article>
<?php /**PATH C:\Users\Carol\Desktop\Nova pasta\pagina-romantica\resources\views/components/polaroid-card.blade.php ENDPATH**/ ?>