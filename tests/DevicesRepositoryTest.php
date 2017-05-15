<?php

use App\Models\Devices;
use App\Repositories\DevicesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DevicesRepositoryTest extends TestCase
{
    use MakeDevicesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DevicesRepository
     */
    protected $devicesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->devicesRepo = App::make(DevicesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDevices()
    {
        $devices = $this->fakeDevicesData();
        $createdDevices = $this->devicesRepo->create($devices);
        $createdDevices = $createdDevices->toArray();
        $this->assertArrayHasKey('id', $createdDevices);
        $this->assertNotNull($createdDevices['id'], 'Created Devices must have id specified');
        $this->assertNotNull(Devices::find($createdDevices['id']), 'Devices with given id must be in DB');
        $this->assertModelData($devices, $createdDevices);
    }

    /**
     * @test read
     */
    public function testReadDevices()
    {
        $devices = $this->makeDevices();
        $dbDevices = $this->devicesRepo->find($devices->id);
        $dbDevices = $dbDevices->toArray();
        $this->assertModelData($devices->toArray(), $dbDevices);
    }

    /**
     * @test update
     */
    public function testUpdateDevices()
    {
        $devices = $this->makeDevices();
        $fakeDevices = $this->fakeDevicesData();
        $updatedDevices = $this->devicesRepo->update($fakeDevices, $devices->id);
        $this->assertModelData($fakeDevices, $updatedDevices->toArray());
        $dbDevices = $this->devicesRepo->find($devices->id);
        $this->assertModelData($fakeDevices, $dbDevices->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDevices()
    {
        $devices = $this->makeDevices();
        $resp = $this->devicesRepo->delete($devices->id);
        $this->assertTrue($resp);
        $this->assertNull(Devices::find($devices->id), 'Devices should not exist in DB');
    }
}
