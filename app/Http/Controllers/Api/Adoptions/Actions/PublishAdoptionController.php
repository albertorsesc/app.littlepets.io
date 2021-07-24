<?php

namespace App\Http\Controllers\Api\Adoptions\Actions;

use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;

class PublishAdoptionController extends Controller
{
    public function __invoke(Adoption $adoption)
    {
        $adoption->toggle();

        return response(
            optional($adoption->published_at)->diffForHumans()
        );
    }
}
