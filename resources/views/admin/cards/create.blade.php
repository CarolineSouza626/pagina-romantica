@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Novo card secreto</h2>
<form method="POST" action="{{ route('admin.secret-cards.store') }}" class="glass-panel mt-6 space-y-4 p-6">
    @csrf
    <input class="admin-input" name="title" placeholder="Título" value="{{ old('title') }}">
    <input class="admin-input" name="clue" placeholder="Pista" value="{{ old('clue') }}">
    <textarea class="admin-input min-h-32" name="cipher_text" placeholder="Texto cifrado">{{ old('cipher_text') }}</textarea>
    <textarea class="admin-input min-h-32" name="revealed_text" placeholder="Texto revelado">{{ old('revealed_text') }}</textarea>
    <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_hidden" class="rounded" checked> escondido</div>
    <button class="emotional-btn" type="submit">salvar card</button>
</form>
@endsection
