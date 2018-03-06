<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KajianApiTest extends TestCase
{
    use MakeKajianTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKajian()
    {
        $kajian = $this->fakeKajianData();
        $this->json('POST', '/api/v1/kajians', $kajian);

        $this->assertApiResponse($kajian);
    }

    /**
     * @test
     */
    public function testReadKajian()
    {
        $kajian = $this->makeKajian();
        $this->json('GET', '/api/v1/kajians/'.$kajian->id);

        $this->assertApiResponse($kajian->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKajian()
    {
        $kajian = $this->makeKajian();
        $editedKajian = $this->fakeKajianData();

        $this->json('PUT', '/api/v1/kajians/'.$kajian->id, $editedKajian);

        $this->assertApiResponse($editedKajian);
    }

    /**
     * @test
     */
    public function testDeleteKajian()
    {
        $kajian = $this->makeKajian();
        $this->json('DELETE', '/api/v1/kajians/'.$kajian->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kajians/'.$kajian->id);

        $this->assertResponseStatus(404);
    }
}
