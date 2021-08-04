<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Database\Seeders\{SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Adoptions\Adoption, Concerns\HandlesMedia, LostPets\LostPet, Media, Pet, Specie, User};

class PetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            SpecieSeeder::class,
        ]);
        $this->fakeEvent();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_belongs_to_user()
    {
        $pet = $this->create(Pet::class);

        $this->assertInstanceOf(User::class, $pet->user);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_belongs_to_specie()
    {
        $this->loadSeeders([SpecieSeeder::class]);
        $pet = $this->create(Pet::class);

        $this->assertInstanceOf(Specie::class, $pet->specie);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_has_one_adoption()
    {
        $pet = $this->create(Pet::class);
        $adoption = $this->create(Adoption::class, ['pet_id' => $pet->id]);

        $this->assertInstanceOf(Adoption::class, $pet->adoption);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_has_one_lost_pet()
    {
        $pet = $this->create(Pet::class);
        $lostPet = $this->create(LostPet::class, ['pet_id' => $pet->id]);

        $this->assertInstanceOf(LostPet::class, $pet->lostPet);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_has_many_media()
    {
        \Storage::fake('public');

        $this->signIn();

        $pet = $this->create(Pet::class);

        $requestWithImages = [
            'images' => [UploadedFile::fake()->image('adoption.jpg', 1, 1),]
        ];

        $this->postJson(route('api.pets.images.store', $pet), $requestWithImages);

        $this->assertInstanceOf(Media::class, $pet->fresh()->media()->first());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_uses_handles_media_trait()
    {
        $this->assertClassUsesTrait(
            HandlesMedia::class,
            Pet::class
        );
    }


}
