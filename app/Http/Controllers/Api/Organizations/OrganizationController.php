<?php

namespace App\Http\Controllers\Api\Organizations;

use App\Http\Requests\Organizations\OrganizationRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Laravel\Jetstream\Events\AddingTeam;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OrganizationResource;

class OrganizationController extends Controller
{
    public function index()
    {
        return OrganizationResource::collection(
            Team::all()
        );
    }

    public function store(OrganizationRequest $request)
    {
        $this->authorize(
            'create',
            Jetstream::newTeamModel()
        );

        AddingTeam::dispatch($user = auth()->user());

        $user->switchTeam(
            $organization = $user->ownedTeams()->create(
                $request->all()
            )
        );

        return new OrganizationResource($organization);
    }

    public function update(OrganizationRequest $request, Team $team)
    {
        $this->authorize('update', $team);

        $team->update($request->all());

        return new OrganizationResource($team);
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return response([], 204);
    }
}
