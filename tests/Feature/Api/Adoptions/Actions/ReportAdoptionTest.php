<?php

namespace Tests\Feature\Api\Adoptions\Actions;

use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportAdoptionTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.';

    /**
     * @test
     * @throws \Throwable
     */
    public function guest_cannot_report_a_adoption()
    {
        $this->signIn();
        $adoption = $this->create(Adoption::class);
        $this->signOut();

        $this->assertCount(0, $adoption->reports);

        $this->postJson(route($this->routePrefix . 'report', $adoption), [
            'reporting_cause' => $adoption->getReportingCauses()['offensive'],
            'comments' => 'Some comments...'
        ])->assertUnauthorized();

        $this->assertCount(0, $adoption->fresh()->reports);
    }

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['POST', '/api/properties/{adoption}/report']
     */
    public function authenticated_user_can_report_a_adoption()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);
        $reportingCause = $adoption->getReportingCauses()['offensive'];

        $this->assertCount(0, $adoption->reports);

        $this->postJson(route($this->routePrefix . 'report', $adoption), [
            'reporting_cause' => $reportingCause,
            'comments' => 'Some comments...'
        ]);

        $this->assertCount(1, $adoption->fresh()->reports);

        $this->assertDatabaseHas('reports', [
            'user_id' => auth()->id(),
            'reportable_id' => $adoption->id,
            'reportable_type' => get_class($adoption),
            'reporting_cause' => $reportingCause,
            'comments' => 'Some comments...'
        ]);
    }
}
