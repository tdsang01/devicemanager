<?php

use App\Models\Repairs;
use App\Repositories\RepairsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepairsRepositoryTest extends TestCase
{
    use MakeRepairsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RepairsRepository
     */
    protected $repairsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->repairsRepo = App::make(RepairsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRepairs()
    {
        $repairs = $this->fakeRepairsData();
        $createdRepairs = $this->repairsRepo->create($repairs);
        $createdRepairs = $createdRepairs->toArray();
        $this->assertArrayHasKey('id', $createdRepairs);
        $this->assertNotNull($createdRepairs['id'], 'Created Repairs must have id specified');
        $this->assertNotNull(Repairs::find($createdRepairs['id']), 'Repairs with given id must be in DB');
        $this->assertModelData($repairs, $createdRepairs);
    }

    /**
     * @test read
     */
    public function testReadRepairs()
    {
        $repairs = $this->makeRepairs();
        $dbRepairs = $this->repairsRepo->find($repairs->id);
        $dbRepairs = $dbRepairs->toArray();
        $this->assertModelData($repairs->toArray(), $dbRepairs);
    }

    /**
     * @test update
     */
    public function testUpdateRepairs()
    {
        $repairs = $this->makeRepairs();
        $fakeRepairs = $this->fakeRepairsData();
        $updatedRepairs = $this->repairsRepo->update($fakeRepairs, $repairs->id);
        $this->assertModelData($fakeRepairs, $updatedRepairs->toArray());
        $dbRepairs = $this->repairsRepo->find($repairs->id);
        $this->assertModelData($fakeRepairs, $dbRepairs->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRepairs()
    {
        $repairs = $this->makeRepairs();
        $resp = $this->repairsRepo->delete($repairs->id);
        $this->assertTrue($resp);
        $this->assertNull(Repairs::find($repairs->id), 'Repairs should not exist in DB');
    }
}
