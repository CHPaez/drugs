<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tipificacionllamadas
 * @package App\Models
 * @version May 23, 2024, 7:41 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $TlUser
 * @property integer $TlCodigoAsociado
 * @property integer $TlDrogueria
 * @property integer $TlPersonaContacto
 * @property integer $TlTelefonoContacto
 * @property integer $TlTelefonoWhatsapp
 * @property integer $TlPrograma
 * @property integer $TlCausal
 * @property integer $TlEstadoTipificacion
 * @property string $TIObservaciones
 */
class tipificacionllamadas extends Model
{


    public $table = 'tipificacionllamadas';
    



    public $fillable = [
        'Id',
        'TlUser',
        'TlCodigoAsociado',
        'TlDrogueria',
        'TlPersonaContacto',
        'TlTelefonoContacto',
        'TlTelefonoWhatsapp',
        'TlPrograma',
        'TlCausal',
        'TlEstadoTipificacion',
        'TIObservaciones'
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
        'TlPersonaContacto' => 'integer',
        'TlTelefonoContacto' => 'integer',
        'TlTelefonoWhatsapp' => 'integer',
        'TlPrograma' => 'integer',
        'TlCausal' => 'integer',
        'TlEstadoTipificacion' => 'integer',
        'TIObservaciones' => 'string'
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
        'TlPersonaContacto' => 'required',
        'TlTelefonoContacto' => 'required',
        'TlTelefonoWhatsapp' => 'required',
        'TlPrograma' => 'required',
        'TlCausal' => 'required',
        'TlEstadoTipificacion' => 'required'
    ];

    
}
