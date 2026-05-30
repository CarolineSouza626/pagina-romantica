<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['card']));

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

foreach (array_filter((['card']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<article x-data="secretReveal()" class="site-card">
    <button type="button" @click="toggle" style="width: 100%; text-align: left; background: transparent; border: 0; padding: 0; cursor: pointer;">
        <div class="site-track-row" style="justify-content: space-between; align-items: flex-start; margin: 0;">
            <div>
                <p class="site-card__meta"><?php echo e($card->clue ?? 'pista escondida'); ?></p>
                <h3 class="site-card__title"><?php echo e($card->title); ?></h3>
            </div>
            <span class="site-badge"><?php echo e($card->is_hidden ? 'bloqueado' : 'aberto'); ?></span>
        </div>
        <div class="site-quote" style="margin-top: 1rem; font-family: 'Courier New', monospace; font-size: 0.92rem; line-height: 1.8;">
            <template x-if="!revealed">
                <p><?php echo e($card->cipher_text); ?></p>
            </template>
            <template x-if="revealed">
                <p style="color: var(--accent);"><?php echo e($card->revealed_text); ?></p>
            </template>
        </div>
    </button>
</article>
<?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\components\secret-card.blade.php ENDPATH**/ ?>