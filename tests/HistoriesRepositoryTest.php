<?php

use App\Models\Histories;
use App\Repositories\HistoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoriesRepositoryTest extends TestCase
{
    use MakeHistoriesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HistoriesRepository
     */
    protected $historiesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->historiesRepo = App::make(HistoriesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHistories()
    {
        $histories = $this->fakeHistoriesData();
        $createdHistories = $this->historiesRepo->create($histories);
        $createdHistories = $createdHistories->toArray();
        $this->assertArrayHasKey('id', $createdHistories);
        $this->assertNotNull($createdHistories['id'], 'Created Histories must have id specified');
        $this->assertNotNull(Histories::find($createdHistories['id']), 'Histories with given id must be in DB');
        $this->assertModelData($histories, $createdHistories);
    }

    /**
     * @test read
     */
    public function testReadHistories()
    {
        $histories = $this->makeHistories();
        $dbHistories = $this->historiesRepo->find($histories->id);
        $dbHistories = $dbHistories->toArray();
        $this->assertModelData($histories->toArray(), $dbHistories);
    }

    /**
     * @test update
     */
    public function testUpdateHistories()
    {
        $histories = $this->makeHistories();
        $fakeHistories = $this->fakeHistoriesData();
        $updatedHistories = $this->historiesRepo->update($fakeHistories, $histories->id);
        $this->assertModelData($fakeHistories, $updatedHistories->toArray());
        $dbHistories = $this->historiesRepo->find($histories->id);
        $this->assertModelData($fakeHistories, $dbHistories->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHistories()
    {
        $histories = $this->makeHistories();
        $resp = $this->historiesRepo->delete($histories->id);
        $this->assertTrue($resp);
        $this->assertNull(Histories::find($histories->id), 'Histories should not exist in DB');
    }
}
