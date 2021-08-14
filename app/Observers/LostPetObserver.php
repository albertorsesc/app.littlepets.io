<?php

namespace App\Observers;

use App\Models\LostPets\LostPet;

class LostPetObserver
{
    /**
     * Handle the adoption "creating" event.
     *
     * @param LostPet $lostPet
     * @return void
     */
    public function creating(LostPet $lostPet)
    {
        $lostPet->pet()->user_id = auth()->id();
    }
}
