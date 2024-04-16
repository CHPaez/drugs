<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class droguerias
 * @package App\Models
 * @version April 9, 2024, 5:38 pm UTC
 *
 * @property bigIncrements $Id
 * @property integer $DrTipoDrogueria
 * @property integer $DrCodigo
 * @property string $DrNombre
 * @property integer $DrTipoIdentificacion
 * @property integer $DrIdentificacion
 * @property integer $DrCiudad
 * @property string $DrDireccion
 */
class droguerias extends Model
{


    public $table = 'droguerias';
    



    public $fillable = [
        'Id',
        'DrTipoDrogueria',
        'DrCodigo',
        'DrNombre',
        'DrTipoIdentificacion',
        'DrIdentificacion',
        'DrCiudad',
        'DrDireccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'DrTipoDrogueria' => 'integer',
        'DrCodigo' => 'integer',
        'DrNombre' => 'string',
        'DrTipoIdentificacion' => 'integer',
        'DrIdentificacion' => 'integer',
        'DrCiudad' => 'integer',
        'DrDireccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DrTipoDrogueria' => 'required',
        'DrCodigo' => 'required',
        'DrNombre' => 'required',
        'DrTipoIdentificacion' => 'required',
        'DrIdentificacion' => 'required',
        'DrCiudad' => 'required'
    ];

    
}
