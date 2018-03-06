<?php

namespace App\Repositories;

use App\Models\Kajian;
use InfyOm\Generator\Common\BaseRepository;

class KajianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_mosque',
        'pemateri',
        'tema',
        'waktu',
        'waktu_kajian'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kajian::class;
    }
}
