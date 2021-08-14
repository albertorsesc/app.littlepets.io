<?php

namespace App\Observers;

use App\Models\Adoptions\Adoption;

class AdoptionObserver
{
    /**
     * Handle the adoption "creating" event.
     *
     * @param Adoption $adoption
     * @return void
     */
    public function creating(Adoption $adoption)
    {
        $adoption->pet()->user_id = auth()->id();
    }
}
