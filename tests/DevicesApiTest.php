<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DevicesApiTest extends TestCase
{
    use MakeDevicesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDevices()
    {
        $devices = $this->fakeDevicesData();
        $this->json('POST', '/api/v1/devices', $devices);

        $this->assertApiResponse($devices);
    }

    /**
     * @test
     */
    public function testReadDevices()
    {
        $devices = $this->makeDevices();
        $this->json('GET', '/api/v1/devices/'.$devices->id);

        $this->assertApiResponse($devices->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDevices()
    {
        $devices = $this->makeDevices();
        $editedDevices = $this->fakeDevicesData();

        $this->json('PUT', '/api/v1/devices/'.$devices->id, $editedDevices);

        $this->assertApiResponse($editedDevices);
    }

    /**
     * @test
     */
    public function testDeleteDevices()
    {
        $devices = $this->makeDevices();
        $this->json('DELETE', '/api/v1/devices/'.$devices->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/devices/'.$devices->id);

        $this->assertResponseStatus(404);
    }
}
