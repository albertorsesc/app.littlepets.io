<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use App\Models\LostPets\LostPet;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Adoptions\Adoption;
use App\Models\Concerns\HasAvatar;
use Laravel\Jetstream\HasProfilePhoto;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Notifications\Notifiable;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasAvatar;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use HasProfilePhoto;
    use SerializeTimestamps;
    use TwoFactorAuthenticatable;

    protected static function boot ()
    {
        parent::boot();
        self::deleting(function ($user) {
            $user->adoptions()->each(fn ($adoption) => $adoption->delete());
            $user->lostPets()->each(fn ($lostPet) => $lostPet->delete());
            \Storage::delete($user->getProfilePhotoUrlAttribute());
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['profile_photo_url',];

    /* Relations */

    public function adoptions() : HasManyThrough
    {
        return $this->hasManyThrough(
            Adoption::class,
            Pet::class,
        )->latest('updated_at');
    }

    public function lostPets() : HasManyThrough
    {
        return $this->hasManyThrough(
            LostPet::class,
            Pet::class,
        )->latest('updated_at');
    }

    public function veterinaries() : HasMany
    {
        return $this->hasMany(Veterinary::class);
    }

    /* Helpers */

    public function isRoot() : bool
    {
        return in_array(
            $this->email,
            config('littlepets.roles.root')
        );
    }

    public function fullName() : string
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    /*public function sendPasswordResetNotification($token)
    {
        $url = config('app.url') . '/reset-password?token='.$token;

        $this->notify(new ResetPasswordNotification($url));
    }*/
}
