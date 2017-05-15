<?php

use App\Models\DeviceLocation;
use App\Repositories\DeviceLocationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceLocationRepositoryTest extends TestCase
{
    use MakeDeviceLocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DeviceLocationRepository
     */
    protected $deviceLocationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->deviceLocationRepo = App::make(DeviceLocationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDeviceLocation()
    {
        $deviceLocation = $this->fakeDeviceLocationData();
        $createdDeviceLocation = $this->deviceLocationRepo->create($deviceLocation);
        $createdDeviceLocation = $createdDeviceLocation->toArray();
        $this->assertArrayHasKey('id', $createdDeviceLocation);
        $this->assertNotNull($createdDeviceLocation['id'], 'Created DeviceLocation must have id specified');
        $this->assertNotNull(DeviceLocation::find($createdDeviceLocation['id']), 'DeviceLocation with given id must be in DB');
        $this->assertModelData($deviceLocation, $createdDeviceLocation);
    }

    /**
     * @test read
     */
    public function testReadDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $dbDeviceLocation = $this->deviceLocationRepo->find($deviceLocation->id);
        $dbDeviceLocation = $dbDeviceLocation->toArray();
        $this->assertModelData($deviceLocation->toArray(), $dbDeviceLocation);
    }

    /**
     * @test update
     */
    public function testUpdateDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $fakeDeviceLocation = $this->fakeDeviceLocationData();
        $updatedDeviceLocation = $this->deviceLocationRepo->update($fakeDeviceLocation, $deviceLocation->id);
        $this->assertModelData($fakeDeviceLocation, $updatedDeviceLocation->toArray());
        $dbDeviceLocation = $this->deviceLocationRepo->find($deviceLocation->id);
        $this->assertModelData($fakeDeviceLocation, $dbDeviceLocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDeviceLocation()
    {
        $deviceLocation = $this->makeDeviceLocation();
        $resp = $this->deviceLocationRepo->delete($deviceLocation->id);
        $this->assertTrue($resp);
        $this->assertNull(DeviceLocation::find($deviceLocation->id), 'DeviceLocation should not exist in DB');
    }
}
