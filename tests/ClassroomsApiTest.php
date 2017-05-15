<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassroomsApiTest extends TestCase
{
    use MakeClassroomsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateClassrooms()
    {
        $classrooms = $this->fakeClassroomsData();
        $this->json('POST', '/api/v1/classrooms', $classrooms);

        $this->assertApiResponse($classrooms);
    }

    /**
     * @test
     */
    public function testReadClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $this->json('GET', '/api/v1/classrooms/'.$classrooms->id);

        $this->assertApiResponse($classrooms->toArray());
    }

    /**
     * @test
     */
    public function testUpdateClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $editedClassrooms = $this->fakeClassroomsData();

        $this->json('PUT', '/api/v1/classrooms/'.$classrooms->id, $editedClassrooms);

        $this->assertApiResponse($editedClassrooms);
    }

    /**
     * @test
     */
    public function testDeleteClassrooms()
    {
        $classrooms = $this->makeClassrooms();
        $this->json('DELETE', '/api/v1/classrooms/'.$classrooms->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/classrooms/'.$classrooms->id);

        $this->assertResponseStatus(404);
    }
}
