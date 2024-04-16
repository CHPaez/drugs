<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ciudades
 * @package App\Models
 * @version April 3, 2024, 7:08 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $CiuDepartamento
 * @property string $CiuCiudad
 */
class ciudades extends Model
{


    public $table = 'ciudades';
    



    public $fillable = [
        'Id',
        'CiuDepartamento',
        'CiuCiudad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'CiuDepartamento' => 'integer',
        'CiuCiudad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'CiuDepartamento' => 'required',
        'CiuCiudad' => 'required'
    ];

    
}
