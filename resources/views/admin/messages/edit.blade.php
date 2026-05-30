@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Editar motivo</h2>
<form method="POST" action="{{ route('admin.love-messages.update', $message) }}" class="glass-panel mt-6 space-y-4 p-6">
    @csrf @method('PUT')
    <input class="admin-input" name="title" value="{{ old('title', $message->title) }}">
    <input class="admin-input" name="subtitle" value="{{ old('subtitle', $message->subtitle) }}">
    <textarea class="admin-input min-h-40" name="body">{{ old('body', $message->body) }}</textarea>
    <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', $message->sort_order) }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" @checked($message->is_active)> ativo</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
@endsection
