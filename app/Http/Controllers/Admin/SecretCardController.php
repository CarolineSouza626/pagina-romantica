<?php

namespace App\Http\Controllers\Admin;

use App\Models\SecretCard;
use Illuminate\Http\Request;

class SecretCardController extends BaseAdminController
{
    public function index()
    {
        return view('admin.cards.index', [
            'cards' => SecretCard::query()->orderBy('sort_order')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.cards.create', ['card' => new SecretCard()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'clue' => ['nullable', 'string', 'max:180'],
            'cipher_text' => ['required', 'string'],
            'revealed_text' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_hidden' => ['nullable', 'boolean'],
        ]);

        $data['is_hidden'] = $request->boolean('is_hidden');

        SecretCard::create($data);

        return redirect()->route('admin.secret-cards.index')->with('success', 'Card secreto criado.');
    }

    public function edit(SecretCard $secret_card)
    {
        return view('admin.cards.edit', ['card' => $secret_card]);
    }

    public function update(Request $request, SecretCard $secret_card)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'clue' => ['nullable', 'string', 'max:180'],
            'cipher_text' => ['required', 'string'],
            'revealed_text' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_hidden' => ['nullable', 'boolean'],
        ]);

        $data['is_hidden'] = $request->boolean('is_hidden');
        $secret_card->update($data);

        return redirect()->route('admin.secret-cards.index')->with('success', 'Card secreto atualizado.');
    }

    public function destroy(SecretCard $secret_card)
    {
        $secret_card->delete();

        return back()->with('success', 'Card secreto removido.');
    }
}
