<?php

namespace Tests\Unit\Http\Requests\LostPets;

use Tests\LostPetTestCase;
use Illuminate\Support\Str;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportLostPetRequestTest extends LostPetTestCase
{
    use RefreshDatabase;

    private $lostPet;
    private string $routePrefix = 'api.lost-pets.report';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->lostPet = $this->create(LostPet::class);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function reporting_cause_is_required()
    {
        $this->postJson(route($this->routePrefix, $this->lostPet), [
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
        $this->postJson(route($this->routePrefix, $this->lostPet), [
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
        $this->postJson(route($this->routePrefix, $this->lostPet), [
            'reporting_cause' => $this->lostPet->getReportingCauses()['no-answer'],
            'comments' => Str::random(256),
        ])->assertJsonValidationErrors('comments');
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function comments_are_required_if_reporting_cause_is_other()
    {
        $this->postJson(route($this->routePrefix, $this->lostPet), [
            'reporting_cause' => $this->lostPet->getReportingCauses()['other'],
            'comments' => null,
        ])->assertJsonValidationErrors('comments');
    }
}
