<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tiposasociados
 * @package App\Models
 * @version March 27, 2024, 4:23 am UTC
 *
 * @property bigIncrements $Taid
 * @property string $TaNombre
 */
class tiposasociados extends Model
{


    public $table = 'tiposasociados';
    



    public $fillable = [
        'id',
        'TaNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TaNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TaNombre' => 'required|unique:tiposasociados,TaNombre'
    ];

    
}
