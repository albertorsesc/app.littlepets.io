<?php

namespace App\Http\Controllers\Api\Veterinaries\Actions;

use App\Http\Controllers\Controller;
use App\Models\Veterinaries\Veterinary;

class PublishVeterinaryController extends Controller
{
    public function __invoke(Veterinary $veterinary)
    {
        $veterinary->toggle();

        return response(
            optional($veterinary->published_at)->diffForHumans()
        );
    }
}
