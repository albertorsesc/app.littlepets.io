<?php

namespace App\Models\Adoptions;

use App\Models\Pet;
use App\Models\Concerns\{
    HasUuid,
    HasLocation,
    Commentable,
    Publishable,
    CanBeReported,
    RecordsActivity,
    SerializeTimestamps
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adoption extends Model
{
    use HasUuid;
    use HasFactory;
    use HasLocation;
    use Commentable;
    use Publishable;
    use CanBeReported;
    use RecordsActivity;
    use SerializeTimestamps;

    protected $fillable = ['title', 'phone', 'bio', 'story', 'published_at', 'adopted_at'];
    protected $casts = ['status' => 'boolean', 'published_at' => 'datetime', 'adopted_at' => 'datetime'];

    public function getRouteKeyName() : string
    {
        return 'uuid';
    }

    /* Relations */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    /* Scopes */

    /* Helpers */

    public function toggleAdoption()
    {
        if (is_null($this->adopted_at)) {
            $this->update(['adopted_at' => now()->toDateTimeString()]);
        } else {
            $this->update(['adopted_at' => null]);
        }
    }

    public function profile() : string
    {
        return route('web.adoptions.show', $this);
    }

    public static function getReportingCauses () : array
    {
        return array_merge([
            'adopted' => 'Ha sido adoptado',
            'not-owner' => 'Dueño de Mascota incorrecto',
        ], config('littlepets.reporting_causes'));
    }

    public function onDelete ()
    {
        $this->pet()->delete();
        $this->location()->delete();
        $this->media()->each(fn ($media) => $media->delete());
        $this->reports()->each(fn ($report) => $report->delete());
    }
}
