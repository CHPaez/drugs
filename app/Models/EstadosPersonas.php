<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class estadospersonas
 * @package App\Models
 * @version April 2, 2024, 7:15 pm UTC
 *
 * @property bigIncrements $Id
 * @property string $EsEstado
 */
class estadospersonas extends Model
{


    public $table = 'estadospersonas';
    



    public $fillable = [
        'Id',
        'EsEstado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'EsEstado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'EsEstado' => 'required'
    ];

    
}
