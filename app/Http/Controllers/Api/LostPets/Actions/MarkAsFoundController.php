<?php

namespace App\Http\Controllers\Api\LostPets\Actions;

use App\Http\Controllers\Controller;
use App\Models\LostPets\LostPet;
use Illuminate\Http\Request;

class MarkAsFoundController extends Controller
{
    public function __invoke(LostPet $lostPet)
    {
        if (is_null($lostPet->found_at)) {
            $lostPet->update(['found_at' => now()->toDateTimeString()]);
        } else {
            $lostPet->update(['found_at' => null]);
        }


        return response(
            optional($lostPet->found_at)->diffForHumans()
        );
    }
}
