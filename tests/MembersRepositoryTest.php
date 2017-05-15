<?php

use App\Models\Members;
use App\Repositories\MembersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MembersRepositoryTest extends TestCase
{
    use MakeMembersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MembersRepository
     */
    protected $membersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->membersRepo = App::make(MembersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMembers()
    {
        $members = $this->fakeMembersData();
        $createdMembers = $this->membersRepo->create($members);
        $createdMembers = $createdMembers->toArray();
        $this->assertArrayHasKey('id', $createdMembers);
        $this->assertNotNull($createdMembers['id'], 'Created Members must have id specified');
        $this->assertNotNull(Members::find($createdMembers['id']), 'Members with given id must be in DB');
        $this->assertModelData($members, $createdMembers);
    }

    /**
     * @test read
     */
    public function testReadMembers()
    {
        $members = $this->makeMembers();
        $dbMembers = $this->membersRepo->find($members->id);
        $dbMembers = $dbMembers->toArray();
        $this->assertModelData($members->toArray(), $dbMembers);
    }

    /**
     * @test update
     */
    public function testUpdateMembers()
    {
        $members = $this->makeMembers();
        $fakeMembers = $this->fakeMembersData();
        $updatedMembers = $this->membersRepo->update($fakeMembers, $members->id);
        $this->assertModelData($fakeMembers, $updatedMembers->toArray());
        $dbMembers = $this->membersRepo->find($members->id);
        $this->assertModelData($fakeMembers, $dbMembers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMembers()
    {
        $members = $this->makeMembers();
        $resp = $this->membersRepo->delete($members->id);
        $this->assertTrue($resp);
        $this->assertNull(Members::find($members->id), 'Members should not exist in DB');
    }
}
