<?php

namespace App\Models\Events;

use App\Models\User;
use App\Models\Concerns\CanBeReported;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use CanBeReported;
    use SerializeTimestamps;

    protected $casts = [
        'starts_at' => 'datetime:Y-m-d H:i:s',
        'ends_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $fillable = ['title', 'excerpt', 'description', 'starts_at', 'ends_at'];

    protected static function boot ()
    {
        parent::boot();
        self::creating(function ($event) {
            $event->user_id = auth()->id();
        });
    }

    /* Relations */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /* Helpers */

    public function profile() : string
    {
        return route('web.events.show', $this);
    }

    public static function getReportingCauses()
    {
        return array_merge([
            'ended' => 'Evento finalizado',
        ], config('littlepets.reporting_causes'));
    }
}
