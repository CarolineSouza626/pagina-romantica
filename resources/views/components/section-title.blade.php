@props(['eyebrow' => null, 'title', 'subtitle' => null])

<div class="site-section__heading">
    @if ($eyebrow)
        <p class="site-section__eyebrow">{{ $eyebrow }}</p>
    @endif
    <h2 class="site-section__title">{{ $title }}</h2>
    @if ($subtitle)
        <p class="site-section__subtitle">{{ $subtitle }}</p>
    @endif
</div>
