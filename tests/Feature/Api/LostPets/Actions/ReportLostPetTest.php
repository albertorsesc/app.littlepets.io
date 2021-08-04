<?php

namespace Tests\Feature\Api\LostPets\Actions;

use App\Models\LostPets\LostPet;
use Tests\LostPetTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportLostPetTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.';

    /**
     * @test
     * @throws \Throwable
     */
    public function guest_cannot_report_a_lost_pet()
    {
        $this->signIn();
        $lostPet = $this->create(LostPet::class);
        $this->signOut();

        $this->assertCount(0, $lostPet->reports);

        $this->postJson(route($this->routePrefix . 'report', $lostPet), [
            'reporting_cause' => $lostPet->getReportingCauses()['offensive'],
            'comments' => 'Some comments...'
        ])->assertUnauthorized();

        $this->assertCount(0, $lostPet->fresh()->reports);
    }

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['POST', '/api/properties/{adoption}/report']
     */
    public function authenticated_user_can_report_a_adoption()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);
        $reportingCause = $lostPet->getReportingCauses()['offensive'];

        $this->assertCount(0, $lostPet->reports);

        $this->postJson(route($this->routePrefix . 'report', $lostPet), [
            'reporting_cause' => $reportingCause,
            'comments' => 'Some comments...'
        ]);

        $this->assertCount(1, $lostPet->fresh()->reports);

        $this->assertDatabaseHas('reports', [
            'user_id' => auth()->id(),
            'reportable_id' => $lostPet->id,
            'reportable_type' => get_class($lostPet),
            'reporting_cause' => $reportingCause,
            'comments' => 'Some comments...'
        ]);
    }
}
