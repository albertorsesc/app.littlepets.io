<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Tests\TestCase;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeterinaryTest extends TestCase
{
    use RefreshDatabase;

    public function veterinary_belongs_to_user()
    {
        $this->fakeEvent();
        $veterinary = $this->create(Veterinary::class);

        $this->assertInstanceOf(User::class, $veterinary->user);
    }
}
