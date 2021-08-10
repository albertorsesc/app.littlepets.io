<?php

namespace Tests\Feature\Api\Adoptions;

use Tests\AdoptionTestCase;
use Illuminate\Support\Arr;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdoptionsTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.';

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_published_adoptions()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class, [], 'published');
        $this->create(Adoption::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $adoption->id,
                    'pet' => ['id' => $adoption->pet->id],
                    'title' => $adoption->title,
                    'phone' => $adoption->phone,
                    'bio' => $adoption->bio,
                    'story' => $adoption->story,
                    'meta' => [
                        'profile' => $adoption->profile(),
                        'publishedAt' => optional($adoption->published_at)->formatLocalized('%b %e'),
                        'adoptedAt' => optional($adoption->adopted_at)->diffForHumans(),
                        'updatedAt' => $adoption->updated_at->diffForHumans(),
                    ]
                ]
            ]
        ]);

        $this->assertCount(1, $response->getOriginalContent());
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_store_an_adoption()
    {
        $this->signIn();

        $adoption = $this->make(Adoption::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption)
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['title' => $adoption->title]
        ]);

        $this->assertDatabaseHas(
            'adoptions',
            Arr::except($adoption->toArray(), ['pet', 'pet_id'])
        );
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_update_an_adoption()
    {
        $this->signIn();

        $existingAdoption = $this->create(Adoption::class);
        $newAdoption = $this->make(Adoption::class, [
            'pet_id' => $existingAdoption->pet_id
        ]);

        $response = $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($newAdoption)
        );
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $existingAdoption->id,
                'title' => $newAdoption->title
            ]
        ]);
        $this->assertDatabaseHas(
            'adoptions',
            Arr::except($newAdoption->toArray(), 'pet')
        );
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_delete_an_adoption()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);

        $this->deleteJson(
            route($this->routePrefix . 'destroy', $adoption)
        )->assertStatus(204);

        $this->assertDatabaseMissing('adoptions', $adoption->toArray());
    }
}
