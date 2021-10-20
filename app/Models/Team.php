<?php

namespace App\Models;

use App\Models\Concerns\Publishable;
use App\Models\Concerns\SerializeTimestamps;
use App\Models\Concerns\Sluggable;
use Laravel\Jetstream\Team as JetstreamTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\Events\{TeamCreated, TeamDeleted, TeamUpdated};

class Team extends JetstreamTeam
{
    use HasFactory;
    use Sluggable;
    use Publishable;
    use SerializeTimestamps;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
        'published_at' => 'datetime:Y-m-d H:i:s',
        'verified_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'phone',
        'email',
        'facebook_profile',
        'site',
        'capacity',
        'about',
        'personal_team',
        'logo',
        'published_at',
        'verified_at',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    protected static function boot ()
    {
        parent::boot();
        self::creating(function ($organization) {
            $organization->user_id = auth()->id();
            $organization->slug = $organization->generateUniqueSlug(request('name'));
        });
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    /* Helpers */

    public function profile() : string
    {
        return route('web.organizations.show', $this->slug);
    }
}
