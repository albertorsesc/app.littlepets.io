<?php

namespace Tests\Feature\Api\Teams;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_create_a_team()
    {
        $this->signIn();

        $team = $this->make(Team::class);

        $response = $this->postJson(
            route('api.teams.store'),
            $team->toArray()
        );

        $this->assertDatabaseHas('teams', [
            'name' => $team->name,
            'user_id' => auth()->id(),
            'personal_team' => true
        ]);

        $this->assertCount(1, auth()->user()->fresh()->ownedTeams);
        $this->assertEquals(
            $team->name,
            auth()->user()->fresh()->currentTeam()->first()->name
        );

        dd(auth()->user()->currentTeam);
    }
}
