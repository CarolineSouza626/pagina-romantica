<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends BaseAdminController
{
    public function index()
    {
        return view('admin.photos.index', [
            'photos' => Photo::query()->orderBy('sort_order')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.photos.create', ['photo' => new Photo()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'caption' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('A imagem deve ser enviada em JPG, JPEG, PNG, WEBP ou GIF.');
                }
            }, 'max:6144'],
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'taken_at' => ['nullable', 'date'],
        ]);

        $image = $request->file('image');
        $imageName = Str::uuid()->toString().'.'.strtolower($image->getClientOriginalExtension());
        $data['image_path'] = $image->storeAs('photos', $imageName, 'public');
        $data['image_url'] = '/storage/'.$data['image_path'];
        $data['is_featured'] = $request->boolean('is_featured');
        unset($data['image']);

        Photo::create($data);

        return redirect()->route('admin.photos.index')->with('success', 'Foto adicionada com carinho.');
    }

    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'caption' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'file', function ($attribute, $value, $fail) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                if (! in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions, true)) {
                    $fail('A imagem deve ser enviada em JPG, JPEG, PNG, WEBP ou GIF.');
                }
            }, 'max:6144'],
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'taken_at' => ['nullable', 'date'],
        ]);

        if ($request->hasFile('image')) {
            if ($photo->image_path) {
                Storage::disk('public')->delete($photo->image_path);
            }

            $image = $request->file('image');
            $imageName = Str::uuid()->toString().'.'.strtolower($image->getClientOriginalExtension());
            $data['image_path'] = $image->storeAs('photos', $imageName, 'public');
            $data['image_url'] = '/storage/'.$data['image_path'];
        }

        $data['is_featured'] = $request->boolean('is_featured');
        unset($data['image']);

        $photo->update($data);

        return redirect()->route('admin.photos.index')->with('success', 'Foto atualizada.');
    }

    public function destroy(Photo $photo)
    {
        if ($photo->image_path) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $photo->delete();

        return back()->with('success', 'Foto removida.');
    }
}
