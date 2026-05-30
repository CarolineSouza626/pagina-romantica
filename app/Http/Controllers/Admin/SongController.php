<?php

namespace App\Http\Controllers\Admin;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SongController extends BaseAdminController
{
    public function index()
    {
        return view('admin.songs.index', [
            'songs' => Song::query()->orderBy('sort_order')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.songs.create', ['song' => new Song()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'artist' => ['nullable', 'string', 'max:120'],
            'audio' => ['required', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['mp3', 'wav', 'ogg', 'm4a', 'aac'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('O áudio deve ser enviado em MP3, WAV, OGG, M4A ou AAC.');
                }
            }, 'max:20480'],
            'cover' => ['nullable', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('A capa deve ser enviada em JPG, JPEG, PNG, WEBP ou GIF.');
                }
            }, 'max:6144'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'duration_seconds' => ['nullable', 'integer', 'min:0'],
        ]);

        $audio = $request->file('audio');
        $audioName = Str::uuid()->toString().'.'.strtolower($audio->getClientOriginalExtension());
        $data['audio_path'] = $audio->storeAs('songs', $audioName, 'public');

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = Str::uuid()->toString().'.'.strtolower($cover->getClientOriginalExtension());
            $data['cover_path'] = $cover->storeAs('song-covers', $coverName, 'public');
        } else {
            $data['cover_path'] = null;
        }
        $data['is_active'] = $request->boolean('is_active');
        unset($data['audio'], $data['cover']);

        Song::create($data);

        return redirect()->route('admin.songs.index')->with('success', 'Música adicionada.');
    }

    public function edit(Song $song)
    {
        return view('admin.songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'artist' => ['nullable', 'string', 'max:120'],
            'audio' => ['nullable', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['mp3', 'wav', 'ogg', 'm4a', 'aac'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('O áudio deve ser enviado em MP3, WAV, OGG, M4A ou AAC.');
                }
            }, 'max:20480'],
            'cover' => ['nullable', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('A capa deve ser enviada em JPG, JPEG, PNG, WEBP ou GIF.');
                }
            }, 'max:6144'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'duration_seconds' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('audio')) {
            Storage::disk('public')->delete($song->audio_path);
            $audio = $request->file('audio');
            $audioName = Str::uuid()->toString().'.'.strtolower($audio->getClientOriginalExtension());
            $data['audio_path'] = $audio->storeAs('songs', $audioName, 'public');
        }

        if ($request->hasFile('cover')) {
            if ($song->cover_path) {
                Storage::disk('public')->delete($song->cover_path);
            }

            $cover = $request->file('cover');
            $coverName = Str::uuid()->toString().'.'.strtolower($cover->getClientOriginalExtension());
            $data['cover_path'] = $cover->storeAs('song-covers', $coverName, 'public');
        }

        $data['is_active'] = $request->boolean('is_active');
        unset($data['audio'], $data['cover']);

        $song->update($data);

        return redirect()->route('admin.songs.index')->with('success', 'Música atualizada.');
    }

    public function destroy(Song $song)
    {
        Storage::disk('public')->delete([$song->audio_path, $song->cover_path]);
        $song->delete();

        return back()->with('success', 'Música removida.');
    }
}
