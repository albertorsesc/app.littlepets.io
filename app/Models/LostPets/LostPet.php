<?php

namespace App\Models\LostPets;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\{CanBeReported, Commentable, HasLocation, HasUuid, Publishable, SerializeTimestamps};
use Illuminate\Support\Carbon;

class LostPet extends Model
{
    use HasUuid;
    use HasFactory;
    use HasLocation;
    use Commentable;
    use Publishable;
    use CanBeReported;
    use SerializeTimestamps;

    const POST_TYPES = ['owner', 'rescuer'];

    protected $casts = ['age' => 'integer', 'published_at' => 'datetime:Y-m-d H:i:s', 'lost_at' => 'datetime:Y-m-d H:i:s', 'found_at' => 'datetime:Y-m-d H:i:s', 'rescued_at' => 'datetime:Y-m-d H:i:s'];
    protected $fillable = ['title', 'post_type', 'phone', 'description', 'published_at', 'lost_at', 'found_at', 'rescued_at'];

    public function getRouteKeyName() : string
    {
        return 'uuid';
    }

    /* Relations */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    /* Mutators */
/*
    public function setLostAtAttribute($lostAt) : string
    {
        return $this->attributes['lost_at'] = $lostAt ? Carbon::make($lostAt)->toDateTimeString() : null;
    }*/

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
