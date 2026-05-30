<?php

namespace App\Http\Controllers\Admin;

use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class TimelineEventController extends BaseAdminController
{
    public function index()
    {
        return view('admin.settings.timeline-index', [
            'events' => TimelineEvent::query()->orderBy('sort_order')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.settings.timeline-form', ['event' => new TimelineEvent()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:40'],
            'happened_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        TimelineEvent::create($data);

        return redirect()->route('admin.timeline-events.index')->with('success', 'Momento adicionado.');
    }

    public function edit(TimelineEvent $timeline_event)
    {
        return view('admin.settings.timeline-form', ['event' => $timeline_event]);
    }

    public function update(Request $request, TimelineEvent $timeline_event)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:40'],
            'happened_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $timeline_event->update($data);

        return redirect()->route('admin.timeline-events.index')->with('success', 'Momento atualizado.');
    }

    public function destroy(TimelineEvent $timeline_event)
    {
        $timeline_event->delete();

        return back()->with('success', 'Momento removido.');
    }
}
