<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin • <?php echo e($title ?? 'Painel'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="cinema-grain bg-paper-50 text-ink">
<?php
    $navigation = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => '✦'],
        ['label' => 'Fotos', 'route' => 'admin.photos.index', 'icon' => '◌'],
        ['label' => 'Músicas', 'route' => 'admin.songs.index', 'icon' => '♪'],
        ['label' => 'Motivos', 'route' => 'admin.love-messages.index', 'icon' => '♡'],
        ['label' => 'Cards secretos', 'route' => 'admin.secret-cards.index', 'icon' => '✧'],
        ['label' => 'Linha do tempo', 'route' => 'admin.timeline-events.index', 'icon' => '⟡'],
        ['label' => 'Configurações', 'route' => 'admin.settings.edit', 'icon' => '⚙'],
    ];
?>
<div class="min-h-screen bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.9),rgba(255,255,255,0)_34%),linear-gradient(180deg,rgba(255,248,245,0.98),rgba(247,232,224,0.98))]">
    <header class="border-b border-white/60 bg-white/55 backdrop-blur-2xl">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-rosewood text-lg text-white shadow-glow">
                    ♡
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.35em] text-rosewood/70">painel administrativo</p>
                    <h1 class="text-xl font-semibold tracking-tight">Arquivo emocional</h1>
                </div>
            </div>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="secondary-btn" type="submit">Sair</button>
            </form>
        </div>
    </header>

    <div class="mx-auto grid max-w-7xl gap-6 px-4 py-6 sm:px-6 lg:grid-cols-[280px_minmax(0,1fr)] lg:px-8">
        <aside class="glass-panel h-fit overflow-hidden p-0 lg:sticky lg:top-6">
            <div class="border-b border-white/60 bg-white/45 px-5 py-5">
                <p class="text-xs uppercase tracking-[0.3em] text-rosewood/65">navegação</p>
                <p class="mt-2 text-lg font-medium">Área curada</p>
                <p class="mt-1 text-sm text-ink/60">Gestão de memórias, imagens e momentos.</p>
            </div>
            <nav class="space-y-2 p-4 text-sm">
                <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a
                        class="flex items-center gap-3 rounded-2xl px-4 py-3 transition duration-300 hover:-translate-y-0.5 hover:bg-white/90 <?php echo e(request()->routeIs($item['route']) ? 'bg-white text-rosewood shadow-sm ring-1 ring-white' : 'text-ink/80'); ?>"
                        href="<?php echo e(route($item['route'])); ?>"
                    >
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-paper-100 text-base text-rosewood"><?php echo e($item['icon']); ?></span>
                        <span class="font-medium"><?php echo e($item['label']); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
        </aside>

        <section class="space-y-6 pb-6">
            <?php if(session('success')): ?>
                <div class="glass-panel border border-emerald-200/80 bg-emerald-50/85 p-4 text-sm text-emerald-900 shadow-sm">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="glass-panel border border-rose-200/80 bg-rose-50/85 p-4 text-sm text-rose-900 shadow-sm">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="glass-panel border border-amber-200/80 bg-amber-50/85 p-4 text-sm text-amber-900 shadow-sm">
                    <p class="font-medium">Não foi possível salvar.</p>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\layouts\admin.blade.php ENDPATH**/ ?>