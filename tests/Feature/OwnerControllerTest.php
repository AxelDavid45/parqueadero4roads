<?php

namespace Tests\Feature;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OwnerControllerTest extends TestCase
{
    use RefreshDatabase;
    private $owner;

    protected function setUp(): void
    {
        parent::setUp();
        $this->owner= Owner::factory()->create(['identity_card' => '123456']);
        Vehicle::factory()->count(3)->create(['owner_id' => '123456', 'brand' => 'ford']);
        Vehicle::factory()->count(3)->create(['owner_id' => '123456', 'brand' => 'nissan']);

    }

    public function test_list_owner_vehicles_byName()
    {
        $response = $this->get("/api/vehicle/owner/{$this->owner->name}");

        $response->assertOk();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(3, 'data');
        $response->assertJsonCount(6,'data.vehiculos');
    }

    public function test_list_owner_vehicles_byIdentity() {
        $response = $this->get("/api/vehicle/owner/identity/{$this->owner->identity_card}");

        $response->assertOk();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(3, 'data');
        $response->assertJsonCount(6,'data.vehiculos');
    }
}
