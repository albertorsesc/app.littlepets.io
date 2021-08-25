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
                    'location.state',
                    'user:id,first_name,last_name,email',
                    'likes:id,likeable_type,likeable_id,liked,liked_by',
                ])
            )
        ]);
    }
}
