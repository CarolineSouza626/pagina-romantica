<?php

namespace Database\Seeders;

use App\Models\LoveMessage;
use App\Models\SecretCard;
use App\Models\Setting;
use App\Models\TimelineEvent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@romantico.test'],
            [
                'name' => 'Admin Romântico',
                'password' => Hash::make('senha-romantica'),
                'is_admin' => true,
            ]
        );

        collect([
            ['key' => 'couple_name', 'value' => 'Samara e Eu'],
            ['key' => 'nickname_line', 'value' => 'aeroporto de mosquito • vida • princesa'],
            ['key' => 'hero_title', 'value' => 'Samara, você é o melhor roteiro que a minha vida já escreveu.'],
            ['key' => 'hero_subtitle', 'value' => 'Uma cápsula do tempo para guardar cinema, afeto, risadas e tudo o que me faz querer ficar.'],
            ['key' => 'love_letter', 'value' => "Samara,\n\nSe o amor tivesse uma estética, ele seria o jeito que você sorri quando percebe que é amada.\n\nVocê é cinema, calmaria, inteligência, jogo, direito, carinho e casa.\nE eu teria escolhido você em qualquer linha do tempo.\n\nCom todo o meu coração,\nsempre."],
            ['key' => 'relationship_started_at', 'value' => now()->subDays(420)->toDateTimeString(), 'type' => 'date'],
        ])->each(function (array $item) {
            Setting::query()->updateOrCreate(
                ['key' => $item['key']],
                [
                    'value' => $item['value'],
                    'group' => 'site',
                    'type' => $item['type'] ?? 'text',
                ]
            );
        });

        LoveMessage::query()->insert([
            ['title' => 'Seu sorriso', 'subtitle' => 'Porque muda o clima do meu mundo inteiro.', 'body' => 'Seu sorriso tem a delicadeza de uma cena final boa demais para esquecer.', 'sort_order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sua inteligência', 'subtitle' => 'Você brilha de um jeito sereno e gigante.', 'body' => 'Admiro a forma como você pensa, argumenta, cresce e ainda deixa tudo leve.', 'sort_order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Nossos momentos', 'subtitle' => 'Os pequenos instantes viram eternidade.', 'body' => 'Eu guardo nossas memórias como quem protege a parte mais bonita de si mesmo.', 'sort_order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        SecretCard::query()->insert([
            ['title' => 'Mensagem do cinema', 'clue' => 'luzes baixas, coração aceso', 'cipher_text' => 'Q2luZW1hLCBzZW1wcmUgcXVlIHZlbnRvIGFvIG5vc3NvIGxhc28u', 'revealed_text' => 'Eu te encontrei no lugar perfeito, e o resto virou destino.', 'sort_order' => 1, 'is_hidden' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        TimelineEvent::query()->insert([
            ['title' => 'Nos conhecemos no cinema', 'description' => 'A primeira cena não foi no filme — foi quando o mundo ficou mais bonito ao seu lado.', 'icon' => '🎬', 'happened_at' => now()->subDays(500), 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Você, direito e jogo', 'description' => 'Admiração, orgulho e aquele brilho de quem vê sua pessoa conquistar tudo o que merece.', 'icon' => '⚖️', 'happened_at' => now()->subDays(350), 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
