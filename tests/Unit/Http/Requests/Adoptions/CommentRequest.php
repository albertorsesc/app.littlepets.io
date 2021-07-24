<?php

namespace Tests\Unit\Http\Requests\Adoptions;

use App\Models\Adoptions\Adoption;
use Database\Seeders\SpecieSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentRequest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.comments.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([SpecieSeeder::class]);
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function body_is_required()
    {
        $validatedField = 'body';
        $brokenRule = null;

        $adoption = $this->create(Adoption::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store', $adoption),
            [$validatedField => $brokenRule]
        )->assertJsonValidationErrors($validatedField);

        $comment = $adoption->comment('Hello there');
        $this->putJson(
            route($this->routePrefix . 'update', [$adoption, $comment]),
            [$validatedField => $brokenRule]
        )->assertJsonValidationErrors($validatedField);
    }
}
