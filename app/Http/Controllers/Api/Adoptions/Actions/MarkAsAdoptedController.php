<?php

namespace App\Http\Controllers\Api\Adoptions\Actions;

use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;

class MarkAsAdoptedController extends Controller
{
    public function __invoke(Adoption $adoption)
    {
        $adoption->toggleAdoption();

        return response(
            optional($adoption->adopted_at)->diffForHumans()
        );
    }
}
