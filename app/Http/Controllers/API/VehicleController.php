<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicle\StoreVehicleRequest;
use App\Http\Resources\Vehicle\VehicleCountResource;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{

    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    public function countBrands()
    {
        return VehicleCountResource::collection(DB::table('vehicles')->select(DB::raw('count(brand) as amount, brand'))->groupBy('brand')->get());
    }

    public function store(StoreVehicleRequest $request)
    {
        $owner = Owner::firstOrCreate(['identity_card' => strtoupper($request->identity_card)], [
            'identity_card' => strtoupper($request->identity_card),
            'name' => $request->name
        ]);

        $vehicle = Vehicle::where('lice_plate', strtoupper($request->license_plate))->first();
        if (!$vehicle) {
            Vehicle::create([
                'lice_plate' => strtoupper($request->license_plate),
                'brand' => $request->brand,
                'type' => strtoupper($request->type),
                'owner_id' => $owner->identity_card
            ]);
            return response()->json(['message' => 'Record created'], 201);
        }
        return response()->json(['message' => 'Vehicle already exists'], 409);
    }

    public function showByLicense($license)
    {
        return new VehicleResource(Vehicle::where('lice_plate', $license)->first());
    }

    public function destroy(Vehicle $id) {

    }
}
