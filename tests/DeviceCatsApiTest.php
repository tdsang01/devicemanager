<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceCatsApiTest extends TestCase
{
    use MakeDeviceCatsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDeviceCats()
    {
        $deviceCats = $this->fakeDeviceCatsData();
        $this->json('POST', '/api/v1/deviceCats', $deviceCats);

        $this->assertApiResponse($deviceCats);
    }

    /**
     * @test
     */
    public function testReadDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $this->json('GET', '/api/v1/deviceCats/'.$deviceCats->id);

        $this->assertApiResponse($deviceCats->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $editedDeviceCats = $this->fakeDeviceCatsData();

        $this->json('PUT', '/api/v1/deviceCats/'.$deviceCats->id, $editedDeviceCats);

        $this->assertApiResponse($editedDeviceCats);
    }

    /**
     * @test
     */
    public function testDeleteDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $this->json('DELETE', '/api/v1/deviceCats/'.$deviceCats->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/deviceCats/'.$deviceCats->id);

        $this->assertResponseStatus(404);
    }
}
