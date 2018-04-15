<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jadwal
 * @package App\Models
 * @version March 27, 2018, 9:47 am UTC
 */
class Jadwal extends Model
{
    use SoftDeletes;

    public $table = 'jadwals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'jadwal',
        'tempat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jadwal' => 'string',
        'tempat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jadwal' => 'required',
        'tempat' => 'required'
    ];

    
}
