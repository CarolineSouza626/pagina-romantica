

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-serif">Configurações</h2>
<form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <input class="admin-input" name="couple_name" placeholder="Nome do casal" value="<?php echo e(old('couple_name', $settings->get('couple_name')?->value)); ?>">
    <input class="admin-input" name="nickname_line" placeholder="Linha de apelidos" value="<?php echo e(old('nickname_line', $settings->get('nickname_line')?->value)); ?>">
    <input class="admin-input" name="hero_title" placeholder="Título principal" value="<?php echo e(old('hero_title', $settings->get('hero_title')?->value)); ?>">
    <input class="admin-input" name="hero_subtitle" placeholder="Subtítulo principal" value="<?php echo e(old('hero_subtitle', $settings->get('hero_subtitle')?->value)); ?>">
    <textarea class="admin-input min-h-48" name="love_letter" placeholder="Carta romântica"><?php echo e(old('love_letter', $settings->get('love_letter')?->value)); ?></textarea>
    <input class="admin-input" type="datetime-local" name="relationship_started_at" value="<?php echo e(old('relationship_started_at', $relationshipStartedAt)); ?>">

    <div class="rounded-3xl border border-rose-100 bg-white/70 p-4 space-y-3">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-rosewood/70">contrato</p>
            <h3 class="mt-2 text-xl font-serif">Adicionar PDF do contrato</h3>
            <p class="mt-1 text-sm text-ink/70">Envie o arquivo em PDF para aparecer na seção pública do contrato.</p>
        </div>

        <input class="admin-input" type="file" name="contract_pdf" accept="application/pdf">

        <div class="text-sm text-ink/70">
            <?php if($contractPdfPath): ?>
                Atual: <a class="text-rosewood underline" href="<?php echo e(Storage::url($contractPdfPath)); ?>" target="_blank" rel="noopener">ver PDF enviado</a>
            <?php else: ?>
                Nenhum contrato enviado ainda.
            <?php endif; ?>
        </div>
    </div>

    <button class="emotional-btn" type="submit">salvar tudo</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\settings\edit.blade.php ENDPATH**/ ?>