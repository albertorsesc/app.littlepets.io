<?php

namespace Tests\Feature\Api\Pets;

use App\Models\Pet;
use Tests\TestCase;
use Tests\Feature\HasPet;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetImagesTest extends TestCase
{
    use HasPet;
    use RefreshDatabase;

    private string $routePrefix = 'api.pets.images.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->seedSpecies();
    }

    /**
     *   @test
     *   @throws \Throwable
     *   @endpoint ['POST', '/api/pets/{pet}/images']
     */
    public function authenticated_users_can_upload_images_to_a_pet()
    {
        Storage::fake();

        $pet = $this->create(Pet::class);
        $requestWithImages = [
            'images' => [
                UploadedFile::fake()->image('pet.jpeg', 1, 1),
                UploadedFile::fake()->image('pet2.jpeg', 1, 1),
            ]
        ];

        $response = $this->postJson(
            route($this->routePrefix . 'store', $pet),
            $requestWithImages
        );
        $response->assertStatus(201);

        $this->assertEquals(2, $pet->fresh()->getOriginalMedia()->count());
    }
}
