<?php

namespace App\Http\Controllers\Api\Events;

use App\Models\Events\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Requests\Events\EventRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return EventResource::collection(
            Event::query()
                 ->with('user:id')
                 ->latest()
                 ->get()
        );
    }

    public function store(EventRequest $request) : EventResource
    {
        return new EventResource(
            Event::create($request->all())
        );
    }

    public function update(EventRequest $request, Event $event) : EventResource
    {
        return new EventResource(
            tap($event)->update($request->all())
        );
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response([], 204);
    }
}
