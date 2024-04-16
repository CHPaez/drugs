<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tipostelefonos
 * @package App\Models
 * @version April 4, 2024, 1:52 am UTC
 *
 * @property bigIncrements $Id
 * @property string $TtTipo
 */
class tipostelefonos extends Model
{


    public $table = 'tipostelefonos';
    



    public $fillable = [
        'Id',
        'TtTipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TtTipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TtTipo' => 'required'
    ];

    
}
