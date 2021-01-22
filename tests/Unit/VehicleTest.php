<?php

namespace Tests\Unit;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTes extends TestCase
{
    use RefreshDatabase;

    public function test_vehicle_belongsTo_owner()
    {
        $owner = Owner::factory()->create(['identity_card' => '123456']);
        $vehicle = Vehicle::factory()->create(['owner_id' => '123456']);
        $this->assertInstanceOf(Owner::class, $vehicle->owner);
        $this->assertEquals('123456', $vehicle->owner->identity_card);
    }
}
