<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use App\Models\LostPets\LostPet;
use App\Models\Adoptions\Adoption;
use App\Observers\LostPetObserver;
use App\Observers\AdoptionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        setlocale(LC_ALL, "es_MX.utf8");
//        Carbon::setLocale(config('app.locale'));

        Adoption::observe(AdoptionObserver::class);
        LostPet::observe(LostPetObserver::class);
    }
}
