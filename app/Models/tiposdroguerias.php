<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class tiposdroguerias
 * @package App\Models
 * @version April 9, 2024, 5:13 pm UTC
 *
 * @property bigIncrements $Id
 * @property string $TdNombre
 */
class tiposdroguerias extends Model
{


    public $primaryKey = "Id";
    
    public $table = 'tiposdroguerias';
    



    public $fillable = [
        'Id',
        'TdNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TdNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TdNombre' => 'required'
    ];

    
}
