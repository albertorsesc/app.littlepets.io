<?php

namespace Tests\Feature\Jetstream;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_accounts_can_be_deleted()
    {
        if (! Features::hasAccountDeletionFeatures()) {
            return $this->markTestSkipped('Account deletion is not enabled.');
        }

        $this->withoutExceptionHandling();
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(DeleteUserForm::class)
                        ->set('password', 'password')
                        ->call('deleteUser');

        $this->assertSoftDeleted('users', [
            'first_name' => $user->fresh()->first_name,
            'last_name' => $user->fresh()->last_name,
            'email' => $user->fresh()->email,
        ]);
    }

    public function test_correct_password_must_be_provided_before_account_can_be_deleted()
    {
        if (! Features::hasAccountDeletionFeatures()) {
            return $this->markTestSkipped('Account deletion is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        Livewire::test(DeleteUserForm::class)
                        ->set('password', 'wrong-password')
                        ->call('deleteUser')
                        ->assertHasErrors(['password']);

        $this->assertNotNull($user->fresh());
    }
}
