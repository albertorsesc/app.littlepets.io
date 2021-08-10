<?php

namespace App\Models\Veterinaries;

use App\Models\Concerns\SerializeTimestamps;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Veterinary extends Model
{
    use HasFactory;
    use SerializeTimestamps;

    protected $casts = [
        'services' => 'array',
        'is_open_at_night' => 'boolean'
    ];
    protected $fillable = ['name', 'services', 'phone', 'is_open_at_night'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($veterinary) {
            $veterinary->user_id = auth()->id();
        });
    }

    /* Relations */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
