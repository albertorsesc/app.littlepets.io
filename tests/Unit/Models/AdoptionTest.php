<?php

namespace Tests\Unit\Models;

use Tests\AdoptionTestCase;
use Illuminate\Http\UploadedFile;
use Database\Seeders\{CountrySeeder, StateSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Comment, Location, Media, Pet, Adoptions\Adoption};

class AdoptionTest extends AdoptionTestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function adoption_belongs_to_pet()
    {
        $this->fakeEvent();
        $adoption = $this->create(Adoption::class);

        $this->assertInstanceOf(Pet::class, $adoption->pet);
    }

    public function adoption_morphs_to_many_comments()
    {
        $this->signIn();
        $adoption = $this->create(Adoption::class);
        $adoption->comment('Some body');

        $this->assertInstanceOf(Comment::class, $adoption->comments->first());
    }

    public function adoption_has_many_media()
    {
        \Storage::fake('public');

        $this->signIn();

        $adoption = $this->create(Adoption::class);

        $requestWithImages = [
            'images' => [UploadedFile::fake()->image('adoption.jpg', 1, 1),]
        ];

        $this->postJson(route('api.adoptions.images.store', $adoption), $requestWithImages);

        $this->assertInstanceOf(Media::class, $adoption->fresh()->media()->first());
    }

    public function adoption_has_one_location()
    {
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class,
        ]);
        $this->signIn();

        $adoption = $this->create(Adoption::class);
        $this->morphsTo(
            Location::class,
            $adoption,
            'locationable'
        );

        $this->assertInstanceOf(Location::class, $adoption->fresh()->location);
    }
}
