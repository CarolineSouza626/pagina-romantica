

<?php $__env->startSection('content'); ?>
    <div class="glass-panel overflow-hidden">
        <div class="grid gap-6 border-b border-white/60 bg-[linear-gradient(135deg,rgba(255,255,255,0.88),rgba(255,248,245,0.7))] p-6 lg:grid-cols-[minmax(0,1fr)_260px] lg:p-8">
            <div>
                <p class="soft-pill w-fit">curadoria do arquivo</p>
                <h2 class="mt-4 text-4xl font-serif tracking-tight text-ink sm:text-5xl">Painel administrativo com clima editorial.</h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-ink/70">
                    Um resumo elegante do acervo, das mensagens e das configurações que alimentam a experiência romântica do projeto.
                </p>
            </div>
            <div class="paper-card flex items-center justify-between gap-4 p-5 lg:flex-col lg:items-start lg:justify-center">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-rosewood/60">status</p>
                    <p class="mt-2 text-xl font-medium">Tudo pronto para edição</p>
                </div>
                <div class="flex h-16 w-16 items-center justify-center rounded-[1.5rem] bg-rosewood text-2xl text-white shadow-glow">♡</div>
            </div>
        </div>

        <div class="p-6 lg:p-8">
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
                <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="paper-card p-5">
                        <p class="text-xs uppercase tracking-[0.3em] text-rosewood/60"><?php echo e($label); ?></p>
                        <div class="mt-4 text-4xl font-serif tracking-tight"><?php echo e($value); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="paper-card mt-6 p-6">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-rosewood/60">configurações emocionais</p>
                        <h3 class="mt-2 text-2xl font-serif">Essência do casal</h3>
                    </div>
                    <p class="text-sm text-ink/60">Informações que aparecem no site principal.</p>
                </div>

                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <div class="rounded-[1.5rem] bg-paper-50 p-5">
                        <p class="text-sm text-ink/60">Nome do casal</p>
                        <p class="mt-2 text-lg font-medium"><?php echo e($settings->get('couple_name')?->value ?? 'não definido'); ?></p>
                    </div>
                    <div class="rounded-[1.5rem] bg-paper-50 p-5">
                        <p class="text-sm text-ink/60">Linha de apelidos</p>
                        <p class="mt-2 text-lg font-medium"><?php echo e($settings->get('nickname_line')?->value ?? 'não definido'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>