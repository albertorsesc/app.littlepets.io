<?php

namespace App\Models;

use App\Models\Concerns\SerializeTimestamps;
use App\Models\LostPets\LostPet;
use App\Models\Adoptions\Adoption;
use App\Models\Concerns\HandlesMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasOne, BelongsTo};

class Pet extends Model
{
    use HasFactory;
    use HandlesMedia;
    use SerializeTimestamps;

    protected $fillable = ['specie_id', 'name', 'gender', 'size', 'weight', 'age', 'age_range'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($pet) {
            $pet->user_id = auth()->id();
        });
    }

    /* Relations */

    public function specie() : BelongsTo
    {
        return $this->belongsTo(Specie::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adoption() : HasOne
    {
        return $this->hasOne(Adoption::class);
    }

    public function lostPet() : HasOne
    {
        return $this->hasOne(LostPet::class);
    }
}
