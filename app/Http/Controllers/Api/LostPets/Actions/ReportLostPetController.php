<?php

namespace App\Http\Controllers\Api\LostPets\Actions;

use App\Models\LostPets\LostPet;
use App\Http\Controllers\Controller;
use App\Http\Requests\LostPets\ReportLostPetRequest;

class ReportLostPetController extends Controller
{
    public function __invoke(
        ReportLostPetRequest $request,
        LostPet $lostPet
    )
    {
        $lostPet->report($request->all());
    }
}
