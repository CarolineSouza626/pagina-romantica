@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-serif">Momento da história</h2>
<form method="POST" action="{{ $event->exists ? route('admin.timeline-events.update', $event) : route('admin.timeline-events.store') }}" class="glass-panel mt-6 space-y-4 p-6">
    @csrf
    @if ($event->exists) @method('PUT') @endif
    <input class="admin-input" name="title" placeholder="Título" value="{{ old('title', $event->title) }}">
    <input class="admin-input" name="icon" placeholder="Ícone" value="{{ old('icon', $event->icon) }}">
    <textarea class="admin-input min-h-40" name="description" placeholder="Descrição">{{ old('description', $event->description) }}</textarea>
    <input class="admin-input" type="date" name="happened_at" value="{{ old('happened_at', optional($event->happened_at)->format('Y-m-d')) }}">
    <input class="admin-input" type="number" name="sort_order" value="{{ old('sort_order', $event->sort_order) }}">
    <button class="emotional-btn" type="submit">salvar momento</button>
</form>
@endsection
