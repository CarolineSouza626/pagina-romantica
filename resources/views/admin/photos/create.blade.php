@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Nova foto</h2>
<form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data" class="glass-panel mt-6 space-y-4 p-6">
    @csrf
    <div>
        <label class="admin-label">Título</label>
        <input class="admin-input" name="title" value="{{ old('title') }}">
    </div>
    <div>
        <label class="admin-label">Legenda</label>
        <input class="admin-input" name="caption" value="{{ old('caption') }}">
    </div>
    <div>
        <label class="admin-label">Imagem</label>
        <input class="admin-input" type="file" name="image" accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif">
    </div>
    <div class="grid gap-4 md:grid-cols-3">
        <input class="admin-input" type="number" name="sort_order" placeholder="ordem" value="{{ old('sort_order', 0) }}">
        <input class="admin-input" type="date" name="taken_at" value="{{ old('taken_at') }}">
        <label class="flex items-center gap-2 pt-3 text-sm"><input type="checkbox" name="is_featured" class="rounded"> destaque</label>
    </div>
    <button class="emotional-btn" type="submit">salvar foto</button>
</form>
@endsection
