<?php

namespace App\Http\Resources\Vehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'placa' => $this->lice_plate,
            'marca' => $this->brand,
            'tipo' => $this->type
        ];
    }
}
