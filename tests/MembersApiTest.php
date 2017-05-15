<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MembersApiTest extends TestCase
{
    use MakeMembersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMembers()
    {
        $members = $this->fakeMembersData();
        $this->json('POST', '/api/v1/members', $members);

        $this->assertApiResponse($members);
    }

    /**
     * @test
     */
    public function testReadMembers()
    {
        $members = $this->makeMembers();
        $this->json('GET', '/api/v1/members/'.$members->id);

        $this->assertApiResponse($members->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMembers()
    {
        $members = $this->makeMembers();
        $editedMembers = $this->fakeMembersData();

        $this->json('PUT', '/api/v1/members/'.$members->id, $editedMembers);

        $this->assertApiResponse($editedMembers);
    }

    /**
     * @test
     */
    public function testDeleteMembers()
    {
        $members = $this->makeMembers();
        $this->json('DELETE', '/api/v1/members/'.$members->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/members/'.$members->id);

        $this->assertResponseStatus(404);
    }
}
