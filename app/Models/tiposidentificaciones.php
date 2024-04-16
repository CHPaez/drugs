<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tiposidentificaciones
 * @package App\Models
 * @version March 27, 2024, 4:28 am UTC
 *
 * @property bigIncrements $Tiid
 * @property string $TiNombre
 */
class tiposidentificaciones extends Model
{


    public $table = 'tiposidentificaciones';
    



    public $fillable = [
        'id',
        'TiNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TiNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TiNombre' => 'required|unique:tiposidentificaciones,TiNombre'
    ];

    

    
}
