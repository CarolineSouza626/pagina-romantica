@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Novo motivo</h2>
<form method="POST" action="{{ route('admin.love-messages.store') }}" class="glass-panel mt-6 space-y-4 p-6">
    @csrf
    <input class="admin-input" name="title" placeholder="Título" value="{{ old('title') }}">
    <input class="admin-input" name="subtitle" placeholder="Subtítulo" value="{{ old('subtitle') }}">
    <textarea class="admin-input min-h-40" name="body" placeholder="Texto">{{ old('body') }}</textarea>
    <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" checked> ativo</div>
    <button class="emotional-btn" type="submit">salvar motivo</button>
</form>
@endsection
