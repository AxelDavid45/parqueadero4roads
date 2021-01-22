<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function showByName($name) {
        return Owner::where('name', $name)->first()->vehicles;
    }

    public function showByIdentity($identity) {
        return Owner::where('identity_card', strtoupper($identity))->first()->vehicles;
    }
}
