<?php

namespace App\Http\Controllers\Web\Veterinaries;

use App\Http\Controllers\Controller;
use App\Http\Resources\VeterinaryResource;
use App\Models\Veterinaries\Veterinary;

class VeterinaryController extends Controller
{
    public function index()
    {
        return view('veterinaries.index');
    }

    public function show(Veterinary $veterinary)
    {
        return view('veterinaries.show', [
            'veterinary' => new VeterinaryResource(
                $veterinary->load([
//                    'user:id,first_name,last_name,email',
//                    'comments.user:id,first_name,last_name,email',
                ])
            )
        ]);
    }
}
