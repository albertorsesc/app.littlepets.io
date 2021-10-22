<?php

namespace App\Http\Controllers\Api\Organizations\Actions;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class VerifyOrganizationController extends Controller
{
    public function __invoke (Team $team)
    {
        if (is_null($team->verified_at)) {
            $team->update([
                'verified_at' => now()->toDateTimeString()
            ]);
        } else {
            $team->update(['verified_at' => null]);
        }

        return response(
            optional($team->verified_at)->format('d-m-Y')
        );
    }
}
