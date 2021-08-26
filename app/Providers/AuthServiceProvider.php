<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use App\Policies\LostPetPolicy;
use App\Models\LostPets\LostPet;
use App\Policies\AdoptionPolicy;
use App\Models\Adoptions\Adoption;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,

        Adoption::class => AdoptionPolicy::class,
        LostPet::class => LostPetPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->isRoot()) {
                return true;
            }
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $url = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)]
            );

            return (new MailMessage)
                ->subject('[LittlePets.io] Correo Electrónico de verificación')
                ->greeting('Bienvenido a LittlePets.io!')
                ->line('Agradecemos te hayas unido a esta comunidad creada especialmente para todos los que queremos el bienestar de animales que necesitan nuestra ayuda!')
                ->line('Este correo es para verificar tu identidad, por favor haz click en el enlace para acceder a tu cuenta!')
                ->action('Verificar mi correo electrónico', $url)
                ->line('Gracias por ayudarnos a ayudar!');
        });
    }
}
