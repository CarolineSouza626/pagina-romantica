@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Editar card secreto</h2>
<form method="POST" action="{{ route('admin.secret-cards.update', $card) }}" class="glass-panel mt-6 space-y-4 p-6">
    @csrf @method('PUT')
    <input class="admin-input" name="title" value="{{ old('title', $card->title) }}">
    <input class="admin-input" name="clue" value="{{ old('clue', $card->clue) }}">
    <textarea class="admin-input min-h-32" name="cipher_text">{{ old('cipher_text', $card->cipher_text) }}</textarea>
    <textarea class="admin-input min-h-32" name="revealed_text">{{ old('revealed_text', $card->revealed_text) }}</textarea>
    <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', $card->sort_order) }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_hidden" class="rounded" @checked($card->is_hidden)> escondido</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
@endsection
