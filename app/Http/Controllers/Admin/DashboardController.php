<?php

namespace App\Http\Controllers\Admin;

use App\Models\LoveMessage;
use App\Models\Photo;
use App\Models\SecretCard;
use App\Models\Song;
use App\Models\TimelineEvent;
use App\Services\SiteContentService;

class DashboardController extends BaseAdminController
{
    public function __invoke(SiteContentService $content)
    {
        return view('admin.dashboard', [
            'stats' => [
                'photos' => Photo::count(),
                'songs' => Song::count(),
                'cards' => SecretCard::count(),
                'messages' => LoveMessage::count(),
                'timeline' => TimelineEvent::count(),
            ],
            'settings' => $content->settings(),
        ]);
    }
}
