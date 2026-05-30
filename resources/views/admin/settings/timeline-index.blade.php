@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Linha do tempo</h2>
    <a class="emotional-btn" href="{{ route('admin.timeline-events.create') }}">novo momento</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($events as $event)
        <div class="paper-card p-5">
            <p class="text-xs uppercase tracking-[0.3em] text-rosewood/55">{{ $event->happened_at?->format('d/m/Y') }}</p>
            <p class="mt-2 text-lg font-medium">{{ $event->icon }} {{ $event->title }}</p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="{{ route('admin.timeline-events.edit', $event) }}">editar</a>
                <form method="POST" action="{{ route('admin.timeline-events.destroy', $event) }}">@csrf @method('DELETE')<button class="secondary-btn">remover</button></form>
            </div>
        </div>
    @endforeach
</div>
@endsection
