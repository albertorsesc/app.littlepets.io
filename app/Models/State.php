<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    public $timestamps = false;

    /* Relations */

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }}
