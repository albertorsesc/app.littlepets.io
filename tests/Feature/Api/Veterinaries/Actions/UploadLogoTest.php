<?php

namespace Tests\Feature\Api\Veterinaries\Actions;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadLogoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function business_owner_can_upload_a_logo()
    {
        \Storage::fake();
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);
        $logo = [
            'logo' => UploadedFile::fake()->image('business-logo.jpeg', 1, 1)
        ];

        $response = $this->putJson(route('veterinaries.logo.store', $veterinary), $logo);
        $response->assertRedirect(route('web.veterinaries.show', $veterinary));

        $this->assertTrue(isset($veterinary->fresh()->logo));
        \Storage::assertExists($veterinary->logo);
    }
}
