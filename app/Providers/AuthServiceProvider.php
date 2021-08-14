<?php

namespace App\Providers;

use App\Models\Adoptions\Adoption;
use App\Models\LostPets\LostPet;
use App\Models\Team;
use App\Policies\AdoptionPolicy;
use App\Policies\LostPetPolicy;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    }
}
