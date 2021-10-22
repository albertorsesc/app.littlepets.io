<?php

namespace App\Http\Controllers\Api\Organizations;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use Illuminate\Http\Request;

class UserOrganizationController extends Controller
{
    public function __invoke ()
    {
        $organization = auth()->user()->currentTeam->load('owner:id,first_name,last_name,current_team_id');

        return response()->json([
            'data' => new OrganizationResource($organization)
        ]);
    }
}
