<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mosque
 * @package App\Models
 * @version February 27, 2018, 2:42 pm UTC
 */
class Mosque extends Model
{
    use SoftDeletes;

    public $table = 'mosques';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'alamat',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'alamat' => 'string',
        'latitude' => 'double',
        'longitude' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'latitude' => 'required',
        'longitude' => 'required'
    ];

      public function kajian()
    {
        return $this->hasMany(Kajian::class,'id_mosque');
    }

    
}
