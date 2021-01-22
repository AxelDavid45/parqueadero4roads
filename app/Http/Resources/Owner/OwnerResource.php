<?php

namespace App\Http\Resources\Owner;

use App\Http\Resources\Vehicle\VehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'cedula' => $this->identity_card,
            'nombre' => $this->name,
            'vehiculos' => VehicleResource::collection($this->vehicles),
        ];
    }
}
