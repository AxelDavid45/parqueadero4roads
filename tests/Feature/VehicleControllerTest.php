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

    public function test_store_vehicle_client()
    {
        $data = [
            'identity_card' => 'EIMA000822HCSSNXA1',
            'name' => 'Axel Espinosa',
            'license_plate' => 'XAS-550-G',
            'brand' => "ford",
            'type' => 'pickup'
        ];

        $response = $this->post('/api/vehicle', $data);

        $response->assertStatus(201);
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(1);
        $this->assertEquals('Record created', $response->json()['message']);
        $this->assertDatabaseHas('owners', [
            'identity_card' => $data['identity_card']
        ]);
        $this->assertDatabaseHas('vehicles', [
            'lice_plate' => $data['license_plate']
        ]);
    }

    public function test_list_vehicles_byLicense() {
        Owner::factory()->create(['identity_card' => '123456']);
        $vehicle = Vehicle::factory()->create(['owner_id' => '123456', 'brand' => 'ford']);
        $request = $this->get("/api/vehicle/{$vehicle->lice_plate}");

        $jsonDecoded = $request->json()['data'];
        $request->assertHeader('content-type', 'application/json');
        $request->assertOk();
        $request->assertJsonCount(3, 'data');
        $this->assertEquals($vehicle->lice_plate, $jsonDecoded['placa']);
    }
}
