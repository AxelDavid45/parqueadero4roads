<?php

namespace Tests\Feature;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_brands()
    {
        Owner::factory()->create(['identity_card' => '123456']);
        Vehicle::factory()->count(3)->create(['owner_id' => '123456', 'brand' => 'ford']);
        Vehicle::factory()->count(3)->create(['owner_id' => '123456', 'brand' => 'nissan']);

        $response = $this->get('/api/vehicle/brand');

        $jsonDecoded = $response->json()['data'];

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $this->assertEquals(3, $jsonDecoded[0]['cantidad']);
        $this->assertEquals(3, $jsonDecoded[1]['cantidad']);
        $response->assertHeader('content-type', 'application/json');
    }

    public function test_store_vehicle_client() {
        
    }
}
