<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class inscritos
 * @package App\Models
 * @version May 22, 2024, 9:09 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $InTipificacion
 * @property integer $InPersonaInscrita
 * @property string $InFechaPrograma
 * @property integer $InHorario
 * @property integer $InModalidad
 * @property integer $InCiudad
 * @property integer $InDatosAdicionales
 * @property string $InObservaciones
 */
class inscritos extends Model
{

    public $primaryKey = "Id";
    public $table = 'inscritos';
    



    public $fillable = [
        'Id',
        'InTipificacion',
        'InPersonaInscrita',
        'InFechaPrograma',
        'InHorario',
        'InModalidad',
        'InCiudad',
        'InDatosAdicionales',
        'InObservaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'InTipificacion' => 'integer',
        'InPersonaInscrita' => 'integer',
        'InFechaPrograma' => 'date',
        'InHorario' => 'integer',
        'InModalidad' => 'integer',
        'InCiudad' => 'integer',
        'InDatosAdicionales' => 'integer',
        'InObservaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'InTipificacion' => 'required',
        'InPersonaInscrita' => 'required',
        'InFechaPrograma' => 'required',
        'InHorario' => 'required',
        'InModalidad' => 'required',
        'InCiudad' => 'required'
    ];

    
}
