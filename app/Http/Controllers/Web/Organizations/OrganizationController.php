<?php

namespace App\Http\Controllers\Web\Organizations;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function show()
    {
        return view('organizations.show');
    }
}
