@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Motivos que amo você</h2>
    <a class="emotional-btn" href="{{ route('admin.love-messages.create') }}">novo motivo</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($messages as $message)
        <div class="paper-card p-5">
            <p class="text-lg font-medium">{{ $message->title }}</p>
            <p class="mt-2 text-sm text-ink/70">{{ $message->subtitle }}</p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="{{ route('admin.love-messages.edit', $message) }}">editar</a>
                <form method="POST" action="{{ route('admin.love-messages.destroy', $message) }}">@csrf @method('DELETE')<button class="secondary-btn">remover</button></form>
            </div>
        </div>
    @endforeach
</div>
@endsection
