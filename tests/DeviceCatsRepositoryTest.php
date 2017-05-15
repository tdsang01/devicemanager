<?php

use App\Models\DeviceCats;
use App\Repositories\DeviceCatsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceCatsRepositoryTest extends TestCase
{
    use MakeDeviceCatsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DeviceCatsRepository
     */
    protected $deviceCatsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->deviceCatsRepo = App::make(DeviceCatsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDeviceCats()
    {
        $deviceCats = $this->fakeDeviceCatsData();
        $createdDeviceCats = $this->deviceCatsRepo->create($deviceCats);
        $createdDeviceCats = $createdDeviceCats->toArray();
        $this->assertArrayHasKey('id', $createdDeviceCats);
        $this->assertNotNull($createdDeviceCats['id'], 'Created DeviceCats must have id specified');
        $this->assertNotNull(DeviceCats::find($createdDeviceCats['id']), 'DeviceCats with given id must be in DB');
        $this->assertModelData($deviceCats, $createdDeviceCats);
    }

    /**
     * @test read
     */
    public function testReadDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $dbDeviceCats = $this->deviceCatsRepo->find($deviceCats->id);
        $dbDeviceCats = $dbDeviceCats->toArray();
        $this->assertModelData($deviceCats->toArray(), $dbDeviceCats);
    }

    /**
     * @test update
     */
    public function testUpdateDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $fakeDeviceCats = $this->fakeDeviceCatsData();
        $updatedDeviceCats = $this->deviceCatsRepo->update($fakeDeviceCats, $deviceCats->id);
        $this->assertModelData($fakeDeviceCats, $updatedDeviceCats->toArray());
        $dbDeviceCats = $this->deviceCatsRepo->find($deviceCats->id);
        $this->assertModelData($fakeDeviceCats, $dbDeviceCats->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDeviceCats()
    {
        $deviceCats = $this->makeDeviceCats();
        $resp = $this->deviceCatsRepo->delete($deviceCats->id);
        $this->assertTrue($resp);
        $this->assertNull(DeviceCats::find($deviceCats->id), 'DeviceCats should not exist in DB');
    }
}
