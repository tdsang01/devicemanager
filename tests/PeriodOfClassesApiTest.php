<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodOfClassesApiTest extends TestCase
{
    use MakePeriodOfClassesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePeriodOfClasses()
    {
        $periodOfClasses = $this->fakePeriodOfClassesData();
        $this->json('POST', '/api/v1/periodOfClasses', $periodOfClasses);

        $this->assertApiResponse($periodOfClasses);
    }

    /**
     * @test
     */
    public function testReadPeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $this->json('GET', '/api/v1/periodOfClasses/'.$periodOfClasses->id);

        $this->assertApiResponse($periodOfClasses->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $editedPeriodOfClasses = $this->fakePeriodOfClassesData();

        $this->json('PUT', '/api/v1/periodOfClasses/'.$periodOfClasses->id, $editedPeriodOfClasses);

        $this->assertApiResponse($editedPeriodOfClasses);
    }

    /**
     * @test
     */
    public function testDeletePeriodOfClasses()
    {
        $periodOfClasses = $this->makePeriodOfClasses();
        $this->json('DELETE', '/api/v1/periodOfClasses/'.$periodOfClasses->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/periodOfClasses/'.$periodOfClasses->id);

        $this->assertResponseStatus(404);
    }
}
