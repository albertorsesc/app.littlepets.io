<?php

namespace Tests\Feature\Api\Adoptions;

use Tests\AdoptionTestCase;
use Illuminate\Http\UploadedFile;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdoptionImagesTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.images.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     *   @endpoint ['POST', '/api/adoptions/{adoption}/images']
     */
    public function authenticated_users_can_upload_images_to_an_adoption()
    {
        \Storage::fake();

        $adoption = $this->create(Adoption::class);
        $requestWithImages = [
            'images' => [
                UploadedFile::fake()->image('adoption.jpeg', 1, 1),
                UploadedFile::fake()->image('adoption2.jpeg', 1, 1),
            ]
        ];

        $response = $this->postJson(route($this->routePrefix . 'store', $adoption), $requestWithImages);
        $response->assertStatus(201);

        $this->assertEquals(2, $adoption->fresh()->getOriginalMedia()->count());
        \Storage::assertExists($adoption->fresh()->media->pluck('file_name')->toArray());
    }
}
