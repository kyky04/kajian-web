<?php

use App\Models\Jadwal;
use App\Repositories\JadwalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JadwalRepositoryTest extends TestCase
{
    use MakeJadwalTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JadwalRepository
     */
    protected $jadwalRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jadwalRepo = App::make(JadwalRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJadwal()
    {
        $jadwal = $this->fakeJadwalData();
        $createdJadwal = $this->jadwalRepo->create($jadwal);
        $createdJadwal = $createdJadwal->toArray();
        $this->assertArrayHasKey('id', $createdJadwal);
        $this->assertNotNull($createdJadwal['id'], 'Created Jadwal must have id specified');
        $this->assertNotNull(Jadwal::find($createdJadwal['id']), 'Jadwal with given id must be in DB');
        $this->assertModelData($jadwal, $createdJadwal);
    }

    /**
     * @test read
     */
    public function testReadJadwal()
    {
        $jadwal = $this->makeJadwal();
        $dbJadwal = $this->jadwalRepo->find($jadwal->id);
        $dbJadwal = $dbJadwal->toArray();
        $this->assertModelData($jadwal->toArray(), $dbJadwal);
    }

    /**
     * @test update
     */
    public function testUpdateJadwal()
    {
        $jadwal = $this->makeJadwal();
        $fakeJadwal = $this->fakeJadwalData();
        $updatedJadwal = $this->jadwalRepo->update($fakeJadwal, $jadwal->id);
        $this->assertModelData($fakeJadwal, $updatedJadwal->toArray());
        $dbJadwal = $this->jadwalRepo->find($jadwal->id);
        $this->assertModelData($fakeJadwal, $dbJadwal->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJadwal()
    {
        $jadwal = $this->makeJadwal();
        $resp = $this->jadwalRepo->delete($jadwal->id);
        $this->assertTrue($resp);
        $this->assertNull(Jadwal::find($jadwal->id), 'Jadwal should not exist in DB');
    }
}
