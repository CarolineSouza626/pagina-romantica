@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Nova música</h2>
<form method="POST" action="{{ route('admin.songs.store') }}" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    @csrf
    <input class="admin-input" name="title" placeholder="Título" value="{{ old('title') }}">
    <input class="admin-input" name="artist" placeholder="Artista" value="{{ old('artist') }}">
    <input class="admin-input" type="file" name="audio" accept="audio/*">
    <input class="admin-input" type="file" name="cover" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    <input class="admin-input" type="number" name="duration_seconds" placeholder="Duração em segundos" value="{{ old('duration_seconds') }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" checked> ativa</div>
    <button class="emotional-btn" type="submit">salvar música</button>
</form>
@endsection
