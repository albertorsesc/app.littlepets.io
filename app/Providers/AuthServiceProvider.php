<?php

namespace App\Providers;

use Illuminate\Support\Facades\{URL, Gate};
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\{Blog\Articles\ArticlePolicy,
    Blog\Articles\BlogCategoryPolicy,
    TeamPolicy,
    LostPetPolicy,
    AdoptionPolicy};
use App\Models\{Blog\Article, Blog\BlogCategory, Team, LostPets\LostPet, Adoptions\Adoption};

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
        Article::class => ArticlePolicy::class,
        BlogCategory::class => BlogCategoryPolicy::class,
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
