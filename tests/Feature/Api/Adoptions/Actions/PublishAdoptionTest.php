<?php

namespace Tests\Feature\Api\Adoptions\Actions;

use Tests\TestCase;
use App\Models\Adoptions\Adoption;
use Database\Seeders\{BreedSeeder, SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishAdoptionTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/adoptions/{adoption}/toggle']
     */
    public function authenticated_user_can_publish_an_adoption()
    {
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class,
        ]);
        $this->signIn();

        $adoption = $this->create(Adoption::class, ['published_at' => null]);
        $this->assertNull($adoption->published_at);

        $this->putJson(route($this->routePrefix . 'toggle', $adoption));
        $this->assertEquals(
            $adoption->fresh()->published_at,
            now()->toDateTimeString()
        );

        $this->putJson(route($this->routePrefix . 'toggle',  $adoption));
        $this->assertNull($adoption->fresh()->published_at);
    }
}
