<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class historialllamadas
 * @package App\Models
 * @version April 4, 2024, 1:23 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $HlUsuario
 * @property datatime $HlFechaRegistro
 */
class historialllamadas extends Model
{


    public $table = 'historialllamadas';
    



    public $fillable = [
        'Id',
        'HlUsuario',
        'HlFechaRegistro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'HlUsuario' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'HlUsuario' => 'required',
        'HlFechaRegistro' => 'required'
    ];

    
}
