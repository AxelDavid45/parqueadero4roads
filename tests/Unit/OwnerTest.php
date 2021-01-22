<?php

namespace Tests\Unit;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_hasMany_vehicles()
    {
        $owner = Owner::factory()->create(['identity_card' => '123456']);
        $vehicles = Vehicle::factory()->count(3)->create([ 'owner_id' => $owner->identity_card ]);
        $this->assertInstanceOf(Collection::class, $owner->vehicles);
        $this->assertEquals(3, $owner->vehicles->count());
    }
}
