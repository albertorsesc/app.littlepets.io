<?php

namespace Tests\Feature\Web;

use App\Models\Shelters\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SheltersTest extends TestCase
{
    use RefreshDatabase;

    public function authenticated_user_can_visit_shelter_view()
    {
        $this->signIn();

        $response = $this->get(
            route('web.shelters.index')
        );
        $response->assertOk();
        $response->assertViewIs('shelters.index');
    }

    public function authenticated_user_can_visit_an_shelter_profile()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $shelter = $this->create(Shelter::class);

        $response = $this->get(
            route('web.shelters.show', $shelter)
        );
        $response->assertOk();
        $response->assertViewIs('shelters.show');
        $response->assertViewHas('shelter');
    }
}
