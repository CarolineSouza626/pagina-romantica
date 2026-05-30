@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Fotos</h2>
    <a class="emotional-btn" href="{{ route('admin.photos.create') }}">nova foto</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($photos as $photo)
        @php
            $photoPath = $photo->image_path;
            $photoUrl = $photo->image_url
                ? (str_starts_with($photo->image_url, 'http') ? $photo->image_url : url($photo->image_url))
                : Storage::url($photoPath);
        @endphp
        <div class="paper-card overflow-hidden p-4">
            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-[linear-gradient(180deg,rgba(255,255,255,0.96),rgba(249,239,232,0.85))]">
                <div id="photo-fallback-{{ $photo->id }}" class="absolute inset-0 flex items-center justify-center px-6 text-center text-sm text-ink/60">
                    <div>
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-white/80 text-xl text-rosewood shadow-sm">◌</div>
                        <p class="mt-4 font-medium text-ink/70">Imagem indisponível</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.28em] text-rosewood/50">{{ $photo->title }}</p>
                    </div>
                </div>
                @if ($photoPath)
                    <img
                        src="{{ $photoUrl }}"
                        class="absolute inset-0 h-full w-full object-cover"
                        alt="{{ $photo->title }}"
                        onload="document.getElementById('photo-fallback-{{ $photo->id }}').style.display='none';"
                        onerror="this.style.display='none';document.getElementById('photo-fallback-{{ $photo->id }}').style.display='flex';"
                    >
                @endif
            </div>
            <h3 class="mt-4 font-medium">{{ $photo->title }}</h3>
            <p class="mt-1 text-sm text-ink/70">{{ $photo->caption }}</p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="{{ route('admin.photos.edit', $photo) }}">editar</a>
                <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                    @csrf @method('DELETE')
                    <button class="secondary-btn" type="submit">remover</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
