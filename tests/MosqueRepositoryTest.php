<?php

use App\Models\Mosque;
use App\Repositories\MosqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MosqueRepositoryTest extends TestCase
{
    use MakeMosqueTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MosqueRepository
     */
    protected $mosqueRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mosqueRepo = App::make(MosqueRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMosque()
    {
        $mosque = $this->fakeMosqueData();
        $createdMosque = $this->mosqueRepo->create($mosque);
        $createdMosque = $createdMosque->toArray();
        $this->assertArrayHasKey('id', $createdMosque);
        $this->assertNotNull($createdMosque['id'], 'Created Mosque must have id specified');
        $this->assertNotNull(Mosque::find($createdMosque['id']), 'Mosque with given id must be in DB');
        $this->assertModelData($mosque, $createdMosque);
    }

    /**
     * @test read
     */
    public function testReadMosque()
    {
        $mosque = $this->makeMosque();
        $dbMosque = $this->mosqueRepo->find($mosque->id);
        $dbMosque = $dbMosque->toArray();
        $this->assertModelData($mosque->toArray(), $dbMosque);
    }

    /**
     * @test update
     */
    public function testUpdateMosque()
    {
        $mosque = $this->makeMosque();
        $fakeMosque = $this->fakeMosqueData();
        $updatedMosque = $this->mosqueRepo->update($fakeMosque, $mosque->id);
        $this->assertModelData($fakeMosque, $updatedMosque->toArray());
        $dbMosque = $this->mosqueRepo->find($mosque->id);
        $this->assertModelData($fakeMosque, $dbMosque->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMosque()
    {
        $mosque = $this->makeMosque();
        $resp = $this->mosqueRepo->delete($mosque->id);
        $this->assertTrue($resp);
        $this->assertNull(Mosque::find($mosque->id), 'Mosque should not exist in DB');
    }
}
