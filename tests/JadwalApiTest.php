<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JadwalApiTest extends TestCase
{
    use MakeJadwalTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJadwal()
    {
        $jadwal = $this->fakeJadwalData();
        $this->json('POST', '/api/v1/jadwals', $jadwal);

        $this->assertApiResponse($jadwal);
    }

    /**
     * @test
     */
    public function testReadJadwal()
    {
        $jadwal = $this->makeJadwal();
        $this->json('GET', '/api/v1/jadwals/'.$jadwal->id);

        $this->assertApiResponse($jadwal->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJadwal()
    {
        $jadwal = $this->makeJadwal();
        $editedJadwal = $this->fakeJadwalData();

        $this->json('PUT', '/api/v1/jadwals/'.$jadwal->id, $editedJadwal);

        $this->assertApiResponse($editedJadwal);
    }

    /**
     * @test
     */
    public function testDeleteJadwal()
    {
        $jadwal = $this->makeJadwal();
        $this->json('DELETE', '/api/v1/jadwals/'.$jadwal->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jadwals/'.$jadwal->id);

        $this->assertResponseStatus(404);
    }
}
