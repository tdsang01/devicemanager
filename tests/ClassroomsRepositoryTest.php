<?php

use App\Models\Classrooms;
use App\Repositories\ClassroomsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassroomsRepositoryTest extends TestCase
{
    use MakeClassroomsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClassroomsRepository
     */
    protected $classroomsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->classroomsRepo = App::make(ClassroomsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateClassrooms()
    {
        $classrooms = $this->fakeClassroomsData();
        $createdClassrooms = $this->classroomsRepo->create($classrooms);
        $createdClassrooms = $createdClassrooms->toArray();
        $this->assertArrayHasKey('id', $createdClassrooms);
        $this->assertNotNull($createdClassrooms['id'], 'Created Classrooms must have id specified');
        $this->assertNotNull(Classrooms::find($createdClassrooms['id']), 'Classrooms with given id must be in DB');
        $this->assertModelData($classrooms, $createdClassrooms);
    }

    /**
     * @test read
     */
    public function testReadClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $dbClassrooms = $this->classroomsRepo->find($classrooms->id);
        $dbClassrooms = $dbClassrooms->toArray();
        $this->assertModelData($classrooms->toArray(), $dbClassrooms);
    }

    /**
     * @test update
     */
    public function testUpdateClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $fakeClassrooms = $this->fakeClassroomsData();
        $updatedClassrooms = $this->classroomsRepo->update($fakeClassrooms, $classrooms->id);
        $this->assertModelData($fakeClassrooms, $updatedClassrooms->toArray());
        $dbClassrooms = $this->classroomsRepo->find($classrooms->id);
        $this->assertModelData($fakeClassrooms, $dbClassrooms->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $resp = $this->classroomsRepo->delete($classrooms->id);
        $this->assertTrue($resp);
        $this->assertNull(Classrooms::find($classrooms->id), 'Classrooms should not exist in DB');
    }
}
