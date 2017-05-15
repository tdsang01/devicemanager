<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoriesApiTest extends TestCase
{
    use MakeHistoriesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHistories()
    {
        $histories = $this->fakeHistoriesData();
        $this->json('POST', '/api/v1/histories', $histories);

        $this->assertApiResponse($histories);
    }

    /**
     * @test
     */
    public function testReadHistories()
    {
        $histories = $this->makeHistories();
        $this->json('GET', '/api/v1/histories/'.$histories->id);

        $this->assertApiResponse($histories->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHistories()
    {
        $histories = $this->makeHistories();
        $editedHistories = $this->fakeHistoriesData();

        $this->json('PUT', '/api/v1/histories/'.$histories->id, $editedHistories);

        $this->assertApiResponse($editedHistories);
    }

    /**
     * @test
     */
    public function testDeleteHistories()
    {
        $histories = $this->makeHistories();
        $this->json('DELETE', '/api/v1/histories/'.$histories->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/histories/'.$histories->id);

        $this->assertResponseStatus(404);
    }
}
