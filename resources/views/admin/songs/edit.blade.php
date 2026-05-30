@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Editar música</h2>
<form method="POST" action="{{ route('admin.songs.update', $song) }}" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    @csrf @method('PUT')
    <input class="admin-input" name="title" value="{{ old('title', $song->title) }}">
    <input class="admin-input" name="artist" value="{{ old('artist', $song->artist) }}">
    <input class="admin-input" type="file" name="audio" accept="audio/*">
    <input class="admin-input" type="file" name="cover" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    <input class="admin-input" type="number" name="duration_seconds" value="{{ old('duration_seconds', $song->duration_seconds) }}">
    <div class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" class="rounded" @checked($song->is_active)> ativa</div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
@endsection
