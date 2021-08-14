<?php

namespace App\Policies;

use App\Models\Adoptions\Adoption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdoptionPolicy
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
     * @param Adoption $adoption
     * @return mixed
     */
    public function update(User $user, Adoption $adoption) : bool
    {
        return (int) $user->id === (int) $adoption->pet->user_id;
    }
}
