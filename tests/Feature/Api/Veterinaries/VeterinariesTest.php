<?php

namespace Tests\Feature\Api\Veterinaries;

use Tests\TestCase;
use Illuminate\Support\Arr;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeterinariesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.veterinaries.';

    /**
     * @test
     *  */
    public function authenticated_user_can_get_all_veterinaries()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class, [], 'published');
        $this->create(Veterinary::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $veterinary->id,
                    'user' => ['id' => $veterinary->user->id],
                    'name' => $veterinary->name,
                    'services' => $veterinary->services,
                    'specialty' => $veterinary->specialty,
                    'phone' => $veterinary->phone,
                    'email' => $veterinary->email,
                    'isOpenAtNight' => $veterinary->is_open_at_night,
                    'facebookProfile' => $veterinary->facebook_profile,
                    'site' => $veterinary->site,
                    'about' => $veterinary->about,
                    'status' => $veterinary->status,
                    'logo' => $veterinary->logo,
                    'meta' => [
                        'profile' => $veterinary->profile(),
                        'updatedAt' => $veterinary->updated_at->diffForHumans()
                    ]
                ]
            ]
        ]);
    }

    /**
     * @test
     *  */
    public function authenticated_user_can_store_a_veterinaries()
    {
        $this->signIn();

        $veterinary = $this->make(Veterinary::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $veterinary->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $veterinary->name]
        ]);
        $this->assertDatabaseHas(
            'veterinaries',
            Arr::except($veterinary->toArray(), ['user_id', 'services'])
        );
        $this->assertEquals(
            $veterinary->services,
            Veterinary::first()->services
        );
    }

    /**
     * @test
     *  */
    public function authenticated_user_can_update_a_veterinary()
    {
        $this->signIn();

        $existingVeterinary = $this->create(Veterinary::class);
        $newVeterinary = $this->make(Veterinary::class);

        $response = $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $newVeterinary->toArray()
        );
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $existingVeterinary->id,
                'name' => $newVeterinary->name
            ]
        ]);

        $this->assertDatabaseHas(
            'veterinaries',
            Arr::except($newVeterinary->toArray(), ['user_id', 'services'])
        );
        $this->assertEquals(
            $newVeterinary->services,
            Veterinary::first()->services
        );
    }

    /**
     * @test
     *  */
    public function authenticated_user_can_delete_a_veterinary()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);

        $this->deleteJson(
            route($this->routePrefix . 'destroy', $veterinary)
        )->assertStatus(204);

        $this->assertDatabaseMissing('veterinaries', $veterinary->toArray());
    }
}
