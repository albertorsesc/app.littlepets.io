<?php

namespace App\Http\Controllers\Web\Organizations;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use App\Models\Team;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function show(Team $team)
    {
        $team->load('owner:id');

        return view('organizations.show', [
            'organization' => new OrganizationResource($team)
        ]);
    }

    public function settings(Team $team)
    {
        $team->load([
            'owner:id',
        ]);

        return view('organizations.settings', [
            'organization' => new OrganizationResource($team)
        ]);
    }
}
