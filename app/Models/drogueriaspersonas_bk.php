<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class drogueriaspersonas
 * @package App\Models
 * @version April 2, 2024, 9:11 pm UTC
 *
 * @property bigIncrements $Id
 * @property integer $DrAsociado
 * @property integer $DrPersona
 * @property integer $DrCodigo
 * @property string $DrNombre
 * @property integer $DrTipoIdentificacion
 * @property  $DrIdentificacion
 * @property string $DrCiudad
 * @property string $DrDireccion
 */
class drogueriaspersonas extends Model
{


    public $table = 'drogueriaspersonas';
    



    public $fillable = [
        'Id',
        'DrAsociado',
        'DrPersona',
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
        'DrAsociado' => 'integer',
        'DrPersona' => 'integer',
        'DrCodigo' => 'integer',
        'DrNombre' => 'string',
        'DrTipoIdentificacion' => 'integer',
        'DrCiudad' => 'string',
        'DrDireccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */ 
    public static $rules = [
        'DrAsociado' => 'required',
        'DrPersona' => 'required',
        'DrCodigo' => 'required',
        'DrNombre' => 'required',
        'DrTipoIdentificacion' => 'required',
        'DrIdentificacion' => 'required',
        'DrCiudad' => 'required',
        'DrDireccion' => 'string'
    ];


    public function asociados()
    {
        return $this->hasOne('App\Models\asociados', 'id','DrAsociado');
    }

    public function personas()
    {
        return $this->hasOne('App\Models\personas', 'id','DrPersona');
    }

    public function tiposIdentificaciones()
    {
        return $this->hasOne('App\Models\tiposIdentificaciones', 'id','DrTipoIdentificacion');
    }

    public function ciudades()
    {
        return $this->hasOne('App\Models\ciudades', 'id','DrCiudad');
    }
    
    
    

}
