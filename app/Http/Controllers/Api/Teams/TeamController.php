<?php

namespace App\Http\Controllers\Api\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        auth()->user()->ownedTeams()->save(
            Team::forceCreate([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'personal_team' => true,
            ])
        );
    }
}
