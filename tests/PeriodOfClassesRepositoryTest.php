<?php

use App\Models\PeriodOfClasses;
use App\Repositories\PeriodOfClassesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodOfClassesRepositoryTest extends TestCase
{
    use MakePeriodOfClassesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PeriodOfClassesRepository
     */
    protected $periodOfClassesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->periodOfClassesRepo = App::make(PeriodOfClassesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePeriodOfClasses()
    {
        $periodOfClasses = $this->fakePeriodOfClassesData();
        $createdPeriodOfClasses = $this->periodOfClassesRepo->create($periodOfClasses);
        $createdPeriodOfClasses = $createdPeriodOfClasses->toArray();
        $this->assertArrayHasKey('id', $createdPeriodOfClasses);
        $this->assertNotNull($createdPeriodOfClasses['id'], 'Created PeriodOfClasses must have id specified');
        $this->assertNotNull(PeriodOfClasses::find($createdPeriodOfClasses['id']), 'PeriodOfClasses with given id must be in DB');
        $this->assertModelData($periodOfClasses, $createdPeriodOfClasses);
    }

    /**
     * @test read
     */
    public function testReadPeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $dbPeriodOfClasses = $this->periodOfClassesRepo->find($periodOfClasses->id);
        $dbPeriodOfClasses = $dbPeriodOfClasses->toArray();
        $this->assertModelData($periodOfClasses->toArray(), $dbPeriodOfClasses);
    }

    /**
     * @test update
     */
    public function testUpdatePeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $fakePeriodOfClasses = $this->fakePeriodOfClassesData();
        $updatedPeriodOfClasses = $this->periodOfClassesRepo->update($fakePeriodOfClasses, $periodOfClasses->id);
        $this->assertModelData($fakePeriodOfClasses, $updatedPeriodOfClasses->toArray());
        $dbPeriodOfClasses = $this->periodOfClassesRepo->find($periodOfClasses->id);
        $this->assertModelData($fakePeriodOfClasses, $dbPeriodOfClasses->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $resp = $this->periodOfClassesRepo->delete($periodOfClasses->id);
        $this->assertTrue($resp);
        $this->assertNull(PeriodOfClasses::find($periodOfClasses->id), 'PeriodOfClasses should not exist in DB');
    }
}
