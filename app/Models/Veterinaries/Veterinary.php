<?php

namespace App\Models\Veterinaries;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\{Likeable, HasLocation, Publishable, CanBeReported, RecordsActivity, SerializeTimestamps};

class Veterinary extends Model
{
    use Likeable;
    use HasFactory;
    use Publishable;
    use HasLocation;
    use CanBeReported;
    use RecordsActivity;
    use SerializeTimestamps;

    protected $casts = [
        'status' => 'boolean',
        'services' => 'array',
        'is_open_at_night' => 'boolean',
        'published_at' => 'datetime:Y-m-d H:i:s'
    ];
    protected $fillable = ['name', 'services', 'specialty', 'phone', 'email', 'is_open_at_night', 'facebook_profile', 'site', 'about', 'published_at', 'logo'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($veterinary) {
            $veterinary->user_id = auth()->id();
            $veterinary->slug = Str::slug($veterinary->name);
        });
        static::deleting(function ($veterinary) {
            if (app()->environment('production')) {
                if (isset($veterinary->logo)) {
                    Storage::disk('s3')->delete(
                        Str::after($veterinary->logo, '.com')
                    );
                }
            } else {
                \Storage::delete($veterinary->logo);
            }
        });
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    /* Relations */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /* Helpers */

    public function profile() : string
    {
        return route('web.veterinaries.show', $this);
    }

    public static function getReportingCauses () : array
    {
        return array_merge([
            'not-owner' => 'Dueño de Veterinaria incorrecto',
        ], config('littlepets.reporting_causes'));
    }
}
