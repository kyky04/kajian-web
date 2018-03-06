<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kajian
 * @package App\Models
 * @version February 27, 2018, 2:51 pm UTC
 */
class Kajian extends Model
{
    use SoftDeletes;

    public $table = 'kajians';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_mosque',
        'pemateri',
        'tema',
        'waktu',
        'waktu_kajian'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_mosque' => 'integer',
        'pemateri' => 'string',
        'tema' => 'string',
        'waktu' => 'date',
        'waktu_kajian' => 'time'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_mosque' => 'required',
        'pemateri' => 'required',
        'tema' => 'required',
        'waktu' => 'required',
        'waktu_kajian' => 'required'
    ];

     public function mosque()
    {
        return $this->belongsTo(Mosque::class,'id_mosque');
    }
}
