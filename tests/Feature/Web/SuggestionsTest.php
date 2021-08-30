<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use App\Models\User;
use App\Models\Suggestion;
use App\Notifications\Root\NotifyNewSuggestion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuggestionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_submit_a_suggestion()
    {
        $this->withoutMiddleware();
        \Notification::fake();

        $this->create(User::class, ['email' => config('littlepets.roles.root')[0]]);
        $this->signIn();

        $newSuggestion = $this->make(Suggestion::class);

        $response = $this->post(
            route('suggestions.store'),
            $newSuggestion->toArray()
        );
        \Notification::assertSentTo(
            User::query()->where(
                'email',
                config('littlepets.roles.root')[0]
            )->get(),
            NotifyNewSuggestion::class
        );
        //        \Event::fake();
        //        \Event::assertDispatched(SuggestionSubmitted::class);

        //        $response->assertViewIs('suggestions');
    }
}
