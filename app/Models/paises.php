<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class paises
 * @package App\Models
 * @version April 3, 2024, 1:26 am UTC
 *
 * @property bigIncrements $Id
 * @property string $PaNombre
 */
class paises extends Model
{


    public $table = 'paises';
    



    public $fillable = [
        'Id',
        'PaNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'PaNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'PaNombre' => 'required'
    ];

    
}
