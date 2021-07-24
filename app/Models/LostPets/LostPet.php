<?php

namespace App\Models\LostPets;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LostPet extends Model
{
    use HasFactory;
    use SerializeTimestamps;

    const POST_TYPES = ['owner', 'rescuer'];

    protected $casts = ['age' => 'integer', 'published_at' => 'datetime', 'lost_at' => 'datetime', 'found_at' => 'datetime', 'rescued_at' => 'datetime'];
    protected $fillable = ['title', 'post_type', 'phone', 'description', 'published_at', 'lost_at', 'found_at', 'rescued_at'];

    /* Relations */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    /* Helpers */

    public function profile() : string
    {
        return route('web.lost-pets.show', $this);
    }
}
