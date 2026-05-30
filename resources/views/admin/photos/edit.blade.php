@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Editar foto</h2>
<form method="POST" action="{{ route('admin.photos.update', $photo) }}" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    @csrf @method('PUT')
    <div>
        <label class="admin-label">Título</label>
        <input class="admin-input" name="title" value="{{ old('title', $photo->title) }}">
    </div>
    <div>
        <label class="admin-label">Legenda</label>
        <input class="admin-input" name="caption" value="{{ old('caption', $photo->caption) }}">
    </div>
    <div>
        <label class="admin-label">Substituir imagem</label>
        <input class="admin-input" type="file" name="image" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    </div>
    <div class="grid gap-4 md:grid-cols-3">
        <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', $photo->sort_order) }}">
        <input class="admin-input" type="date" name="taken_at" value="{{ old('taken_at', optional($photo->taken_at)->format('Y-m-d')) }}">
        <label class="flex items-center gap-2 pt-3 text-sm"><input type="checkbox" name="is_featured" class="rounded" @checked($photo->is_featured)> destaque</label>
    </div>
    <button class="emotional-btn" type="submit">atualizar</button>
</form>
@endsection
