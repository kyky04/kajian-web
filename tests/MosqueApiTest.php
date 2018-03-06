<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MosqueApiTest extends TestCase
{
    use MakeMosqueTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMosque()
    {
        $mosque = $this->fakeMosqueData();
        $this->json('POST', '/api/v1/mosques', $mosque);

        $this->assertApiResponse($mosque);
    }

    /**
     * @test
     */
    public function testReadMosque()
    {
        $mosque = $this->makeMosque();
        $this->json('GET', '/api/v1/mosques/'.$mosque->id);

        $this->assertApiResponse($mosque->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMosque()
    {
        $mosque = $this->makeMosque();
        $editedMosque = $this->fakeMosqueData();

        $this->json('PUT', '/api/v1/mosques/'.$mosque->id, $editedMosque);

        $this->assertApiResponse($editedMosque);
    }

    /**
     * @test
     */
    public function testDeleteMosque()
    {
        $mosque = $this->makeMosque();
        $this->json('DELETE', '/api/v1/mosques/'.$mosque->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mosques/'.$mosque->id);

        $this->assertResponseStatus(404);
    }
}
