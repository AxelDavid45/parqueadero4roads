<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'lice_plate' => $this->faker->creditCardNumber(),
            'brand' => $this->faker->word(),
            'type' => $this->faker->colorName(),
            'owner_id' => Owner::factory()
        ];
    }
}
