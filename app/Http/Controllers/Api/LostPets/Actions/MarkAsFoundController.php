<?php

namespace App\Http\Controllers\Api\LostPets\Actions;

use App\Http\Controllers\Controller;
use App\Models\LostPets\LostPet;
use Illuminate\Http\Request;

class MarkAsFoundController extends Controller
{
    public function __invoke(LostPet $lostPet)
    {
        $lostPet->update(['found_at' => now()->toDateTimeString()]);

        return response(
            optional($lostPet->found_at)->diffForHumans()
        );
    }
}
