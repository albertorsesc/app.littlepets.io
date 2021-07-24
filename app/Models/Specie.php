<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specie extends Model
{
    /* Relations */

    public function breeds() : HasMany
    {
        return $this->hasMany(Breed::class);
    }
}
