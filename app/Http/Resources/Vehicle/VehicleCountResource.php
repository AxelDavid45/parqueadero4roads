<?php

namespace App\Http\Resources\Vehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleCountResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'marca' => ucfirst($this->brand),
            'cantidad' => $this->amount
        ];
    }
}
