<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class personas
 * @package App\Models
 * @version May 21, 2024, 6:23 am UTC
 *
 * @property bigIncrements $Id
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
        'PeTipoIdentificacion' => 'required',
        'PeNumeroIdentificacion' => 'required',
        'PeNombre' => 'required',
        'PeApellido' => 'string'
    ];

    

    public function TiposIdentificaciones()
    
        {
            return $this->hasOne('App\Models\TiposIdentificaciones', 'id','PeTipoIdentificacion');
        }

        public function Genero()
        {
            return $this->hasOne('App\Models\Genero', 'id','PeGenero');
        }
    } 

