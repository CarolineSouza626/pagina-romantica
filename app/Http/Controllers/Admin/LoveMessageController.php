<?php

namespace App\Http\Controllers\Admin;

use App\Models\LoveMessage;
use Illuminate\Http\Request;

class LoveMessageController extends BaseAdminController
{
    public function index()
    {
        return view('admin.messages.index', [
            'messages' => LoveMessage::query()->orderBy('sort_order')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.messages.create', ['message' => new LoveMessage()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'subtitle' => ['nullable', 'string', 'max:160'],
            'body' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        LoveMessage::create($data);

        return redirect()->route('admin.love-messages.index')->with('success', 'Motivo adicionado.');
    }

    public function edit(LoveMessage $love_message)
    {
        return view('admin.messages.edit', ['message' => $love_message]);
    }

    public function update(Request $request, LoveMessage $love_message)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'subtitle' => ['nullable', 'string', 'max:160'],
            'body' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $love_message->update($data);

        return redirect()->route('admin.love-messages.index')->with('success', 'Motivo atualizado.');
    }

    public function destroy(LoveMessage $love_message)
    {
        $love_message->delete();

        return back()->with('success', 'Motivo removido.');
    }
}
