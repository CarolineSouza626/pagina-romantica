<?php

namespace App\Services;

use App\Models\LoveMessage;
use App\Models\Photo;
use App\Models\SecretCard;
use App\Models\Setting;
use App\Models\Song;
use App\Models\TimelineEvent;
use Illuminate\Support\Collection;

class SiteContentService
{
    public function settings(): Collection
    {
        return Setting::query()->get()->keyBy('key');
    }

    public function homePageData(): array
    {
        $settings = $this->settings();

        return [
            'settings' => $settings,
            'heroTitle' => $settings->get('hero_title')?->value ?? 'Para Samara, a minha vida em forma de cinema.',
            'heroSubtitle' => $settings->get('hero_subtitle')?->value ?? 'Uma cápsula do tempo para guardar tudo o que o nosso amor nunca esqueceu.',
            'letterBody' => $settings->get('love_letter')?->value ?? 'Samara, você é a cena mais bonita que o destino já me entregou. Desde o cinema até cada pequena lembrança, tudo em você parece feito para ficar.',
            'contractPdfPath' => $settings->get('contract_pdf_path')?->value ?? null,
            'photos' => Photo::query()->orderBy('sort_order')->latest('id')->get(),
            'songs' => Song::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'reasons' => LoveMessage::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'secretCards' => SecretCard::query()->orderBy('sort_order')->get(),
            'timelineEvents' => TimelineEvent::query()->orderBy('sort_order')->get(),
            'startedAt' => $settings->get('relationship_started_at')?->value ?? now()->subYears(1)->toIso8601String(),
            'coupleName' => $settings->get('couple_name')?->value ?? 'Samara e eu',
            'nicknameLine' => $settings->get('nickname_line')?->value ?? 'aeroporto de mosquito • vida • princesa',
        ];
    }
}
