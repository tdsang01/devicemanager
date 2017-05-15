<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceLocationApiTest extends TestCase
{
    use MakeDeviceLocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDeviceLocation()
    {
        $deviceLocation = $this->fakeDeviceLocationData();
        $this->json('POST', '/api/v1/deviceLocations', $deviceLocation);

        $this->assertApiResponse($deviceLocation);
    }

    /**
     * @test
     */
    public function testReadDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $this->json('GET', '/api/v1/deviceLocations/'.$deviceLocation->id);

        $this->assertApiResponse($deviceLocation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $editedDeviceLocation = $this->fakeDeviceLocationData();

        $this->json('PUT', '/api/v1/deviceLocations/'.$deviceLocation->id, $editedDeviceLocation);

        $this->assertApiResponse($editedDeviceLocation);
    }

    /**
     * @test
     */
    public function testDeleteDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $this->json('DELETE', '/api/v1/deviceLocations/'.$deviceLocation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/deviceLocations/'.$deviceLocation->id);

        $this->assertResponseStatus(404);
    }
}
