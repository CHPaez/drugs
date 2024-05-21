<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class personas
 * @package App\Models
 * @version March 27, 2024, 6:52 pm UTC
 *
 * @property bigIncrements $Id
 * @property integer $PeTipoAsociado
 * @property integer $PeTipoIdentificacion
 * @property integer $PeNumeroIdentificacion
 * @property string $PeGenero
 * @property string $PeNombre
 * @property string $PeApellido
 * @property string $PeCorreo
 */
class personas extends Model
{

    public $primaryKey = "Id";

    public $table = 'personas';
    

    public $fillable = [
        'Id',
        'PeEstadoPersona',
        'PeTipoAsociado',
        'PeTipoIdentificacion',
        'PeNumeroIdentificacion',
        'PeGenero',
        'PeNombre',
        'PeApellido',
        'PeCorreo'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'PeEstadoPersona' => 'integer',
        'PeTipoAsociado' => 'integer',
        'PeTipoIdentificacion' => 'integer',
        'PeNumeroIdentificacion' => 'integer',
        'PeGenero' => 'string',
        'PeNombre' => 'string',
        'PeApellido' => 'string',
        'PeCorreo' => 'string'        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'PeEstadoPersona' => 'required',
        'PeTipoAsociado' => 'required',
        'PeTipoIdentificacion' => 'required',
        'PeNumeroIdentificacion' => 'required',
        'PeGenero' => 'required',
        'PeNombre' => 'string',
        'PeApellido' => 'string'
        
    ];


    
  
    public function tiposasociados()
    {
        return $this->hasOne('App\Models\tiposasociados', 'id','PeTipoAsociado');
    }

    public function TiposIdentificaciones()
    {
        return $this->hasOne('App\Models\TiposIdentificaciones', 'id','PeTipoIdentificacion');
    }

    public function Genero()
    {
        return $this->hasOne('App\Models\Genero', 'id','PeGenero');
    }

    public function EstadosPersonas()
    {
        return $this->hasOne('App\Models\EstadosPersonas', 'id','PeEstadoPersona');
    }
 
    
    } 

    

