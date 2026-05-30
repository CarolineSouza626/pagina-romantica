@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Músicas</h2>
    <a class="emotional-btn" href="{{ route('admin.songs.create') }}">nova música</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($songs as $song)
        <div class="paper-card p-5">
            <p class="text-lg font-medium">{{ $song->title }}</p>
            <p class="text-sm text-ink/70">{{ $song->artist }}</p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="{{ route('admin.songs.edit', $song) }}">editar</a>
                <form method="POST" action="{{ route('admin.songs.destroy', $song) }}">@csrf @method('DELETE')<button class="secondary-btn">remover</button></form>
            </div>
        </div>
    @endforeach
</div>
@endsection
