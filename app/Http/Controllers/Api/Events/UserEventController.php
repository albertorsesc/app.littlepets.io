<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserEventController extends Controller
{
    public function __invoke () : AnonymousResourceCollection
    {
        return EventResource::collection(
            auth()->user()->events->load('user:id')
        );
    }
}
