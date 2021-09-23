<?php

namespace App\Models\Organizations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'facebook_profile', 'about', 'animal_capacity'];

    protected $casts = ['animal_capacity' => 'integer'];
}
