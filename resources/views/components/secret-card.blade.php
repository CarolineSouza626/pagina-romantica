@props(['card'])

<article x-data="secretReveal()" class="site-card">
    <button type="button" @click="toggle" style="width: 100%; text-align: left; background: transparent; border: 0; padding: 0; cursor: pointer;">
        <div class="site-track-row" style="justify-content: space-between; align-items: flex-start; margin: 0;">
            <div>
                <p class="site-card__meta">{{ $card->clue ?? 'pista escondida' }}</p>
                <h3 class="site-card__title">{{ $card->title }}</h3>
            </div>
            <span class="site-badge">{{ $card->is_hidden ? 'bloqueado' : 'aberto' }}</span>
        </div>
        <div class="site-quote" style="margin-top: 1rem; font-family: 'Courier New', monospace; font-size: 0.92rem; line-height: 1.8;">
            <template x-if="!revealed">
                <p>{{ $card->cipher_text }}</p>
            </template>
            <template x-if="revealed">
                <p style="color: var(--accent);">{{ $card->revealed_text }}</p>
            </template>
        </div>
    </button>
</article>
