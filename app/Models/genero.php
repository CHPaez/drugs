<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class genero
 * @package App\Models
 * @version March 27, 2024, 5:13 pm UTC
 *
 * @property string $id
 * @property string $GeNombre
 */
class genero extends Model
{


    public $table = 'generos';
    



    public $fillable = [
        'id',
        'GeNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'GeNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'string',
        'GeNombre' => 'required'
    ];

    
}
