<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Tests\TestCase;
use App\Models\Shelters\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShelterTest extends TestCase
{
    use RefreshDatabase;

    public function shelter_belongs_to_user()
    {
        $this->fakeEvent();
        $shelter = $this->create(Shelter::class);

        $this->assertInstanceOf(User::class, $shelter->user);
    }
}
