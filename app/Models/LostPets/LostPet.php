<?php

namespace App\Models\LostPets;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\{CanBeReported, Commentable, HasLocation, Publishable, SerializeTimestamps};

class LostPet extends Model
{
    use HasFactory;
    use HasLocation;
    use Commentable;
    use Publishable;
    use CanBeReported;
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

    public static function getReportingCauses () : array
    {
        return array_merge([
            'found' => 'La mascota ha sido encontrada por su Dueño',
            'not-owner' => 'Dueño de Mascota incorrecto',
        ], config('littlepets.reporting_causes'));
    }
}
