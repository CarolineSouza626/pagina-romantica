@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h2 class="text-3xl font-serif">Cards secretos</h2>
    <a class="emotional-btn" href="{{ route('admin.secret-cards.create') }}">novo card</a>
</div>

<div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($cards as $card)
        <div class="paper-card p-5">
            <p class="text-lg font-medium">{{ $card->title }}</p>
            <p class="mt-2 text-sm text-ink/70">{{ $card->clue }}</p>
            <div class="mt-4 flex gap-2">
                <a class="secondary-btn" href="{{ route('admin.secret-cards.edit', $card) }}">editar</a>
                <form method="POST" action="{{ route('admin.secret-cards.destroy', $card) }}">@csrf @method('DELETE')<button class="secondary-btn">remover</button></form>
            </div>
        </div>
    @endforeach
</div>
@endsection
