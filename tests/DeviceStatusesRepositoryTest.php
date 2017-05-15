<?php

use App\Models\DeviceStatuses;
use App\Repositories\DeviceStatusesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceStatusesRepositoryTest extends TestCase
{
    use MakeDeviceStatusesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DeviceStatusesRepository
     */
    protected $deviceStatusesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->deviceStatusesRepo = App::make(DeviceStatusesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDeviceStatuses()
    {
        $deviceStatuses = $this->fakeDeviceStatusesData();
        $createdDeviceStatuses = $this->deviceStatusesRepo->create($deviceStatuses);
        $createdDeviceStatuses = $createdDeviceStatuses->toArray();
        $this->assertArrayHasKey('id', $createdDeviceStatuses);
        $this->assertNotNull($createdDeviceStatuses['id'], 'Created DeviceStatuses must have id specified');
        $this->assertNotNull(DeviceStatuses::find($createdDeviceStatuses['id']), 'DeviceStatuses with given id must be in DB');
        $this->assertModelData($deviceStatuses, $createdDeviceStatuses);
    }

    /**
     * @test read
     */
    public function testReadDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $dbDeviceStatuses = $this->deviceStatusesRepo->find($deviceStatuses->id);
        $dbDeviceStatuses = $dbDeviceStatuses->toArray();
        $this->assertModelData($deviceStatuses->toArray(), $dbDeviceStatuses);
    }

    /**
     * @test update
     */
    public function testUpdateDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $fakeDeviceStatuses = $this->fakeDeviceStatusesData();
        $updatedDeviceStatuses = $this->deviceStatusesRepo->update($fakeDeviceStatuses, $deviceStatuses->id);
        $this->assertModelData($fakeDeviceStatuses, $updatedDeviceStatuses->toArray());
        $dbDeviceStatuses = $this->deviceStatusesRepo->find($deviceStatuses->id);
        $this->assertModelData($fakeDeviceStatuses, $dbDeviceStatuses->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDeviceStatuses()
    {
        $deviceStatuses = $this->makeDeviceStatuses();
        $resp = $this->deviceStatusesRepo->delete($deviceStatuses->id);
        $this->assertTrue($resp);
        $this->assertNull(DeviceStatuses::find($deviceStatuses->id), 'DeviceStatuses should not exist in DB');
    }
}
