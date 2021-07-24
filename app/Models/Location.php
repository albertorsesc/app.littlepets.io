<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{MorphTo, BelongsTo};

class Location extends Model
{
    use HasFactory, SerializeTimestamps;

    protected $casts = ['coordinates' => 'array'];
    protected $fillable = ['locationable_id', 'locationable_type', 'address', 'neighborhood', 'city', 'state_id', 'zip_code', 'coordinates', 'google_map_url'];

    /* Relations */

    public function locationable() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @todo: Test State relationship without dependencies.
     */
    public function state() : BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
