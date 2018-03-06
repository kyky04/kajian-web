<?php

namespace App\Repositories;

use App\Models\Mosque;
use InfyOm\Generator\Common\BaseRepository;

class MosqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'latitude',
        'longitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mosque::class;
    }
}
