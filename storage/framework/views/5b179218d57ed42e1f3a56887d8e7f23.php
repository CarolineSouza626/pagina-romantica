

<?php $__env->startSection('content'); ?>
<div class="site-home">
    <section class="site-hero">
        <div class="site-hero__copy">
            <p class="site-pill">para <?php echo e($coupleName); ?></p>
            <h1 class="site-hero__title"><?php echo e($heroTitle); ?></h1>
            <p class="site-hero__lead"><?php echo e($heroSubtitle); ?></p>
            <p class="site-hero__kicker"><?php echo e($nicknameLine); ?></p>

            <div class="site-actions">
                <a href="#historia" class="site-button">começar a história</a>
                <a href="#fotos" class="site-button--secondary">ver fotos</a>
                <a href="#playlist" class="site-button--secondary">ouvir a trilha</a>
            </div>

            <div class="site-hero__panel">
                <div class="site-quote">
                    <p class="site-copy__meta">memória principal</p>
                    <h2 class="site-panel__title" style="margin-top: 0.55rem; font-size: clamp(1.5rem, 2.8vw, 2.4rem);">O cinema onde tudo começou.</h2>
                    <p class="site-copy" style="margin-top: 0.75rem;">Entre a tela iluminada e o silêncio bonito do começo, a nossa história encontrou o caminho mais certo: o seu sorriso.</p>
                </div>

                <div class="site-panel" x-data="loveTimer('<?php echo e($startedAt); ?>')" x-init="init">
                    <div class="site-card__kicker">tempo juntos</div>
                    <div class="site-stat-grid" style="margin-top: 1rem;">
                        <template x-for="(value, key) in diff" :key="key">
                            <div class="site-stat">
                                <div class="site-stat__value" x-text="String(value).padStart(2,'0')"></div>
                                <div class="site-stat__label" x-text="key"></div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <aside class="site-hero__frame">
            <div class="site-hero__media"></div>
            <div class="site-quote">
                <p class="site-card__kicker">quadro de abertura</p>
                <h2 class="site-panel__title" style="margin-top: 0.55rem; font-size: clamp(1.4rem, 2vw, 2rem);">Uma cápsula do tempo com luz quente e memória viva.</h2>
                <p class="site-copy" style="margin-top: 0.75rem;">Tudo aqui foi pensado para parecer íntimo, tátil e cinematográfico, como uma coleção de cenas guardadas com carinho.</p>
            </div>
        </aside>
    </section>

    <section id="historia" class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">capsula do tempo</p>
            <h2 class="site-section__title">Um álbum feito para respirar emoções.</h2>
            <p class="site-section__subtitle">Tudo aqui foi pensado para parecer artesanal, íntimo e cuidadosamente guardado como uma lembrança que não pode ser esquecida.</p>
        </div>

        <div class="site-timeline-grid">
            <?php $__currentLoopData = $timelineEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="site-card">
                    <p class="site-card__meta"><?php echo e($event->happened_at?->format('d/m/Y') ?? 'memória'); ?></p>
                    <h3 class="site-card__title"><?php echo e($event->icon); ?> <?php echo e($event->title); ?></h3>
                    <p class="site-card__text"><?php echo e($event->description); ?></p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section id="fotos" class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">scrapbook digital</p>
            <h2 class="site-section__title">A galeria que parece tocável.</h2>
            <p class="site-section__subtitle">Polaroids, fita, recortes, desordem bonita — como um álbum vivo, organizado pelo coração.</p>
        </div>

        <div class="site-gallery">
            <?php $__empty_1 = true; $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalc3bce41b2cfd2ad696a2b987017660a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3bce41b2cfd2ad696a2b987017660a6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.polaroid-card','data' => ['photo' => $photo]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('polaroid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['photo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($photo)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3bce41b2cfd2ad696a2b987017660a6)): ?>
<?php $attributes = $__attributesOriginalc3bce41b2cfd2ad696a2b987017660a6; ?>
<?php unset($__attributesOriginalc3bce41b2cfd2ad696a2b987017660a6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3bce41b2cfd2ad696a2b987017660a6)): ?>
<?php $component = $__componentOriginalc3bce41b2cfd2ad696a2b987017660a6; ?>
<?php unset($__componentOriginalc3bce41b2cfd2ad696a2b987017660a6); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="site-card">Nenhuma foto adicionada ainda. Use o painel para começar o álbum.</div>
            <?php endif; ?>
        </div>
    </section>

    <section id="playlist" class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">trilha sonora</p>
            <h2 class="site-section__title">Músicas que seguram a nossa história pela mão.</h2>
            <p class="site-section__subtitle">A playlist foi pensada para tocar como um abraço suave — discreta, elegante e emocional.</p>
        </div>

        <div class="site-player" x-data="playlistPlayer(<?php echo \Illuminate\Support\Js::from($songs->map(fn($song) => ['title' => $song->title, 'artist' => $song->artist, 'url' => Storage::url($song->audio_path), 'cover' => $song->cover_path ? Storage::url($song->cover_path) : null])->values())->toHtml() ?>)" x-init="init">
            <div class="site-player__cover">
                <template x-if="tracks[currentIndex] && tracks[currentIndex].cover">
                    <img :src="tracks[currentIndex].cover" alt="cover">
                </template>
                <template x-if="!tracks[currentIndex] || !tracks[currentIndex].cover">
                    <div style="text-align:center; padding: 1rem;">
                        <p style="font-size: 3rem; margin: 0;">♥</p>
                        <p class="site-card__meta" style="margin-top: 0.75rem;">playlist</p>
                    </div>
                </template>
            </div>

            <div class="site-player__body">
                <p class="site-card__kicker">agora tocando</p>
                <h3 class="site-panel__title" style="margin-top: 0.6rem; font-size: clamp(1.8rem, 3vw, 3rem);" x-text="tracks[currentIndex]?.title ?? 'adicione músicas no admin'"></h3>
                <p class="site-copy" x-text="tracks[currentIndex]?.artist ?? 'a trilha emocional do casal'" style="margin-top: 0.55rem;"></p>

                <div class="site-control-row">
                    <button class="site-button--secondary" @click="previous">anterior</button>
                    <button class="site-button" @click="toggle" x-text="isPlaying ? 'pausar' : 'ouvir agora'"></button>
                    <button class="site-button--secondary" @click="next">próxima</button>
                </div>

                <div>
                    <input type="range" min="0" max="100" :value="progress" @input="seek" class="site-input">
                    <div class="site-track-row" style="margin-top: 1rem;">
                        <span class="site-track__meta">volume</span>
                        <input type="range" min="0" max="1" step="0.05" :value="volume" @input="setVolume" class="site-input">
                    </div>
                </div>

                <div class="site-track-list">
                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="site-track">
                            <div class="site-track__meta">faixa</div>
                            <div class="site-panel__title" style="margin-top: 0.55rem; font-size: 1.1rem;"><?php echo e($song->title); ?></div>
                            <div class="site-track__artist" style="margin-top: 0.3rem;"><?php echo e($song->artist); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">motivos que amo você</p>
            <h2 class="site-section__title">Pequenas razões, grandes universos.</h2>
            <p class="site-section__subtitle">Cada card é um lembrete de que o amor também mora nos detalhes mais suaves.</p>
        </div>

        <div class="site-grid">
            <?php $__empty_1 = true; $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalc12d0a70dd48703f588752037eb70fb6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc12d0a70dd48703f588752037eb70fb6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.emotional-card','data' => ['title' => $reason->title,'text' => $reason->subtitle ? $reason->subtitle . ' — ' . $reason->body : $reason->body]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('emotional-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($reason->title),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($reason->subtitle ? $reason->subtitle . ' — ' . $reason->body : $reason->body)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc12d0a70dd48703f588752037eb70fb6)): ?>
<?php $attributes = $__attributesOriginalc12d0a70dd48703f588752037eb70fb6; ?>
<?php unset($__attributesOriginalc12d0a70dd48703f588752037eb70fb6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc12d0a70dd48703f588752037eb70fb6)): ?>
<?php $component = $__componentOriginalc12d0a70dd48703f588752037eb70fb6; ?>
<?php unset($__componentOriginalc12d0a70dd48703f588752037eb70fb6); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="site-card">Cadastre motivos no painel administrativo.</div>
            <?php endif; ?>
        </div>
    </section>

    <section id="carta" class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">carta</p>
            <h2 class="site-section__title">Uma folha para tudo o que eu ainda quero dizer.</h2>
            <p class="site-section__subtitle">Aqui mora a carta longa, íntima e editável pelo painel, como uma página guardada no tempo.</p>
        </div>

        <div class="site-letter">
            <div class="site-letter__body"><?php echo nl2br(e($letterBody)); ?></div>
        </div>
    </section>

    <section class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">nosso contrato oficial</p>
            <h2 class="site-section__title">O documento que assina o destino com elegância.</h2>
            <p class="site-section__subtitle">Um PDF juramentado pelo afeto, pronto para ser substituído no painel sempre que a história pedir outra versão.</p>
        </div>

        <div class="site-contract">
            <div class="site-control-row" style="margin-top: 0;">
                <?php if($contractPdfPath): ?>
                    <a class="site-button" href="<?php echo e(Storage::url($contractPdfPath)); ?>" download>baixar PDF</a>
                <?php else: ?>
                    <span class="site-pill">PDF ainda não enviado</span>
                <?php endif; ?>
                <p class="site-copy">Feito para parecer um contrato bonito, mas sentir como um juramento.</p>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="site-section__heading">
            <p class="site-section__eyebrow">cards secretos</p>
            <h2 class="site-section__title">Pistas escondidas para quando o coração quiser brincar.</h2>
            <p class="site-section__subtitle">Mensagens cifradas, revelações suaves e pequenos segredos com cheiro de presente surpresa.</p>
        </div>

        <div class="site-secret-grid">
            <?php $__currentLoopData = $secretCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal96001c5a0c587407ae4dbcf1b5d66254 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal96001c5a0c587407ae4dbcf1b5d66254 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secret-card','data' => ['card' => $card]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secret-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['card' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal96001c5a0c587407ae4dbcf1b5d66254)): ?>
<?php $attributes = $__attributesOriginal96001c5a0c587407ae4dbcf1b5d66254; ?>
<?php unset($__attributesOriginal96001c5a0c587407ae4dbcf1b5d66254); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal96001c5a0c587407ae4dbcf1b5d66254)): ?>
<?php $component = $__componentOriginal96001c5a0c587407ae4dbcf1b5d66254; ?>
<?php unset($__componentOriginal96001c5a0c587407ae4dbcf1b5d66254); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section class="site-section" style="padding-bottom: 5rem;">
        <div class="site-closing" style="text-align: center;">
            <p class="site-card__meta">easter eggs</p>
            <h2 class="site-panel__title" style="margin-top: 0.75rem; font-size: clamp(1.9rem, 3vw, 2.8rem);">Cinema, jogos e você em cada detalhe.</h2>
            <p class="site-copy" style="max-width: 44rem; margin: 0.85rem auto 0;">Abra os olhos devagar: tem brilho de tela, atmosfera de sala escura, pequenos gestos de joystick e frases que só fazem sentido para quem viveu isso de verdade.</p>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Carol\Desktop\Samara\resources\views\home\index.blade.php ENDPATH**/ ?>