<?php

namespace App\Http\Controllers\Api\Organizations\Actions;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class VerifyOrganizationController extends Controller
{
    public function __invoke (Team $team)
    {
        $team->update(['verified_at' => now()->toDateTimeString()]);

        return response(
            optional($team->verified_at)->diffForHumans()
        );
    }
}
