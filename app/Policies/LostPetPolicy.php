<?php

namespace App\Policies;

use App\Models\LostPets\LostPet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LostPetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param LostPet $lostPet
     * @return mixed
     */
    public function update(User $user, LostPet $lostPet) : bool
    {
        return (int) $user->id === (int) $lostPet->pet->user_id;
    }
}
