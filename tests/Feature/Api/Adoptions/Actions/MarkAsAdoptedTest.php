<?php

namespace Tests\Feature\Api\Adoptions\Actions;

use Tests\TestCase;
use App\Models\Adoptions\Adoption;
use Database\Seeders\{SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarkAsAdoptedTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/adoptions/{adoption}/toggle']
     */
    public function authenticated_user_can_mark_an_adoption_pet_as_adopted()
    {
        $this->loadSeeders([
            SpecieSeeder::class,
        ]);
        $this->signIn();

        $adoption = $this->create(Adoption::class, ['adopted_at' => null]);
        $this->assertNull($adoption->adopted_at);

        $this->putJson(route($this->routePrefix . 'adopted', $adoption));
        $this->assertEquals(
            $adoption->fresh()->adopted_at,
            now()->toDateTimeString()
        );

        $this->putJson(route($this->routePrefix . 'adopted',  $adoption));
        $this->assertNull($adoption->fresh()->adopted_at);
    }
}
