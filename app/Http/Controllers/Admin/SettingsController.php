<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingsController extends BaseAdminController
{
    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => Setting::query()->get()->keyBy('key'),
            'relationshipStartedAt' => $this->formatRelationshipStartedAt(),
            'contractPdfPath' => Setting::query()->where('key', 'contract_pdf_path')->value('value'),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'couple_name' => ['nullable', 'string', 'max:120'],
            'nickname_line' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string', 'max:255'],
            'love_letter' => ['nullable', 'string'],
            'relationship_started_at' => ['nullable', 'date'],
            'contract_pdf' => ['nullable', 'file', function ($attribute, $value, $fail) {
                if (strtolower($value->getClientOriginalExtension()) !== 'pdf') {
                    $fail('O contrato deve ser enviado em PDF.');
                }
            }, 'max:20480'],
        ]);

        $settingMap = [
            'couple_name',
            'nickname_line',
            'hero_title',
            'hero_subtitle',
            'love_letter',
            'relationship_started_at',
        ];

        foreach ($settingMap as $key) {
            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $data[$key] ?? null, 'group' => 'site', 'type' => $key === 'relationship_started_at' ? 'date' : 'text']
            );
        }

        if ($request->hasFile('contract_pdf')) {
            $contractPdf = $request->file('contract_pdf');
            $pdfName = Str::uuid()->toString().'.'.strtolower($contractPdf->getClientOriginalExtension());
            $path = $contractPdf->storeAs('contracts', $pdfName, 'public');

            Setting::query()->updateOrCreate(
                ['key' => 'contract_pdf_path'],
                ['value' => $path, 'group' => 'site', 'type' => 'file']
            );
        }

        return back()->with('success', 'Configurações emocionais atualizadas.');
    }

    private function formatRelationshipStartedAt(): ?string
    {
        $value = Setting::query()->where('key', 'relationship_started_at')->value('value');

        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d\TH:i') : null;
    }
}
