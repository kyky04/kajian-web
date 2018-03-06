<?php

use App\Models\Kajian;
use App\Repositories\KajianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KajianRepositoryTest extends TestCase
{
    use MakeKajianTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KajianRepository
     */
    protected $kajianRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kajianRepo = App::make(KajianRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKajian()
    {
        $kajian = $this->fakeKajianData();
        $createdKajian = $this->kajianRepo->create($kajian);
        $createdKajian = $createdKajian->toArray();
        $this->assertArrayHasKey('id', $createdKajian);
        $this->assertNotNull($createdKajian['id'], 'Created Kajian must have id specified');
        $this->assertNotNull(Kajian::find($createdKajian['id']), 'Kajian with given id must be in DB');
        $this->assertModelData($kajian, $createdKajian);
    }

    /**
     * @test read
     */
    public function testReadKajian()
    {
        $kajian = $this->makeKajian();
        $dbKajian = $this->kajianRepo->find($kajian->id);
        $dbKajian = $dbKajian->toArray();
        $this->assertModelData($kajian->toArray(), $dbKajian);
    }

    /**
     * @test update
     */
    public function testUpdateKajian()
    {
        $kajian = $this->makeKajian();
        $fakeKajian = $this->fakeKajianData();
        $updatedKajian = $this->kajianRepo->update($fakeKajian, $kajian->id);
        $this->assertModelData($fakeKajian, $updatedKajian->toArray());
        $dbKajian = $this->kajianRepo->find($kajian->id);
        $this->assertModelData($fakeKajian, $dbKajian->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKajian()
    {
        $kajian = $this->makeKajian();
        $resp = $this->kajianRepo->delete($kajian->id);
        $this->assertTrue($resp);
        $this->assertNull(Kajian::find($kajian->id), 'Kajian should not exist in DB');
    }
}
