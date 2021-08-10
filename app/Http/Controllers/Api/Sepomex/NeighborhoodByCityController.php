<?php

namespace App\Http\Controllers\Api\Sepomex;

use App\Http\Controllers\Controller;
use App\Services\GeoLocations\Mexico\SepomexApi;
use Illuminate\Http\Request;

class NeighborhoodByCityController extends Controller
{
    public SepomexApi $service;

    public function __construct (SepomexApi $service)
    {
        $this->service = $service;
    }

    public function __invoke ($city) : array
    {
        return $this->service->getNeighborhoodsByCity($city);
    }
}
