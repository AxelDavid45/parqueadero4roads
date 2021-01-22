<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Owner\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function showByName($name) {
        return new OwnerResource(Owner::where('name', $name)->first());
    }

    public function showByIdentity($identity) {
        return new OwnerResource(Owner::where('identity_card', strtoupper($identity))->first());
    }
}
