<?php

namespace App\Http\Controllers\Api\Organizations;

use App\Models\Team;
use App\Http\Controllers\Controller;

class PublishOrganizationController extends Controller
{
    public function __invoke(Team $team)
    {
        $team->toggle();

        return response(
            optional($team->published_at)->diffForHumans()
        );
    }
}
