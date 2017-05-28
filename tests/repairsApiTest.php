<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepairsApiTest extends TestCase
{
    use MakeRepairsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRepairs()
    {
        $repairs = $this->fakeRepairsData();
        $this->json('POST', '/api/v1/repairs', $repairs);

        $this->assertApiResponse($repairs);
    }

    /**
     * @test
     */
    public function testReadRepairs()
    {
        $repairs = $this->makeRepairs();
        $this->json('GET', '/api/v1/repairs/'.$repairs->id);

        $this->assertApiResponse($repairs->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRepairs()
    {
        $repairs = $this->makeRepairs();
        $editedRepairs = $this->fakeRepairsData();

        $this->json('PUT', '/api/v1/repairs/'.$repairs->id, $editedRepairs);

        $this->assertApiResponse($editedRepairs);
    }

    /**
     * @test
     */
    public function testDeleteRepairs()
    {
        $repairs = $this->makeRepairs();
        $this->json('DELETE', '/api/v1/repairs/'.$repairs->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/repairs/'.$repairs->id);

        $this->assertResponseStatus(404);
    }
}
