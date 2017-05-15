<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceStatusesApiTest extends TestCase
{
    use MakeDeviceStatusesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDeviceStatuses()
    {
        $deviceStatuses = $this->fakeDeviceStatusesData();
        $this->json('POST', '/api/v1/deviceStatuses', $deviceStatuses);

        $this->assertApiResponse($deviceStatuses);
    }

    /**
     * @test
     */
    public function testReadDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $this->json('GET', '/api/v1/deviceStatuses/'.$deviceStatuses->id);

        $this->assertApiResponse($deviceStatuses->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $editedDeviceStatuses = $this->fakeDeviceStatusesData();

        $this->json('PUT', '/api/v1/deviceStatuses/'.$deviceStatuses->id, $editedDeviceStatuses);

        $this->assertApiResponse($editedDeviceStatuses);
    }

    /**
     * @test
     */
    public function testDeleteDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $this->json('DELETE', '/api/v1/deviceStatuses/'.$deviceStatuses->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/deviceStatuses/'.$deviceStatuses->id);

        $this->assertResponseStatus(404);
    }
}
