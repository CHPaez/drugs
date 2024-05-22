<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class drogueriaspersonas
 * @package App\Models
 * @version May 21, 2024, 8:40 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $DpAsociado
 * @property integer $DpDrogueria
 * @property integer $DpPersona
 * @property integer $DpEstadoPersona
 * @property integer $DpTipoAsociado
 */
class drogueriaspersonas extends Model
{

    public $primaryKey = "Id";

    public $table = 'drogueriaspersonas';
    



    public $fillable = [
        'Id',
        'DpAsociado',
        'DpDrogueria',
        'DpPersona',
        'DpEstadoPersona',
        'DpTipoAsociado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'DpAsociado' => 'integer',
        'DpDrogueria' => 'integer',
        'DpPersona' => 'integer',
        'DpEstadoPersona' => 'integer',
        'DpTipoAsociado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DpAsociado' => 'required',
        'DpDrogueria' => 'required',
        'DpPersona' => 'required',
        'DpEstadoPersona' => 'required',
        'DpTipoAsociado' => 'required'
    ];

    public function asociados()
    
        {
            return $this->hasOne('App\Models\asociados', 'id','DpAsociado');
        }
    
    public function droguerias()
    
        {
            return $this->hasOne('App\Models\droguerias', 'id','DpDrogueria');
        }

    public function personas()
    
        {
            return $this->hasOne('App\Models\personas', 'id','DpPersona');
        }

    public function estadospersonas()
    
        {
            return $this->hasOne('App\Models\estadospersonas', 'id','DpEstadoPersona');
        }

        public function tiposasociados()
    
        {
            return $this->hasOne('App\Models\tiposasociados', 'id','DpTipoAsociado');
        }

    
}
