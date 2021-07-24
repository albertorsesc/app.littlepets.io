<?php

namespace App\Http\Controllers\Api\Adoptions\Actions;

use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adoptions\ReportAdoptionRequest;

class ReportAdoptionController extends Controller
{
    public function __invoke(
        ReportAdoptionRequest $request,
        Adoption $adoption
    )
    {
        $adoption->report($request->all());
    }
}
