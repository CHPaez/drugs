<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tipificacionllamadas
 * @package App\Models
 * @version April 4, 2024, 9:04 pm UTC
 *
 * @property bigIncrements $Id
 * @property integer $TlUser
 * @property integer $TlCodigoAsociado
 * @property integer $TlDrogueria
 * @property integer $TlPersona
 */
class tipificacionllamadas extends Model
{


    public $table = 'tipificacionllamadas';
    



    public $fillable = [
        'Id',
        'TlUser',
        'TlCodigoAsociado',
        'TlDrogueria',
        'TlPersona'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TlUser' => 'integer',
        'TlCodigoAsociado' => 'integer',
        'TlDrogueria' => 'integer',
        'TlPersona' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TlUser' => 'required',
        'TlCodigoAsociado' => 'required',
        'TlDrogueria' => 'required',
        'TlPersona' => 'required'
    ];

    
}
