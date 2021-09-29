<?php

namespace App\Http\Controllers\Web\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Events\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Event $event)
    {
        return view('events.show', [
            'event' => new EventResource(
                $event->load('user:id')
            )
        ]);
    }
}
