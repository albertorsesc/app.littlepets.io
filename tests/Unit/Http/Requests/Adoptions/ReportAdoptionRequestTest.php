<?php

namespace Tests\Unit\Http\Requests\Adoptions;

use Illuminate\Support\Str;
use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportAdoptionRequestTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private $adoption;
    private string $routePrefix = 'api.adoptions.report';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->adoption = $this->create(Adoption::class);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function reporting_cause_is_required()
    {
        $this->postJson(route($this->routePrefix, $this->adoption), [
            'reporting_cause' => null,
            'comments' => 'Some comments',
        ])->assertJsonValidationErrors('reporting_cause');
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function reporting_cause_must_not_exceed_100_characters()
    {
        $this->postJson(route($this->routePrefix, $this->adoption), [
            'reporting_cause' => Str::random(101),
            'comments' => 'Some comments',
        ])->assertJsonValidationErrors('reporting_cause');
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function comments_must_not_exceed_255_characters()
    {
        $this->postJson(route($this->routePrefix, $this->adoption), [
            'reporting_cause' => $this->adoption->getReportingCauses()['no-answer'],
            'comments' => Str::random(256),
        ])->assertJsonValidationErrors('comments');
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function comments_are_required_if_reporting_cause_is_other()
    {
        $this->postJson(route($this->routePrefix, $this->adoption), [
            'reporting_cause' => $this->adoption->getReportingCauses()['other'],
            'comments' => null,
        ])->assertJsonValidationErrors('comments');
    }
}
