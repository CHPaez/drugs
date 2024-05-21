<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class drogueriaspersonas
 * @package App\Models
 * @version April 9, 2024, 5:09 pm UTC
 *
 * @property bigIncrements $Id
 * @property integer $DpAsociado
 * @property integer $DpDrogueria
 * @property integer $DpPersona
 */
class drogueriaspersonas extends Model
{

    public $primaryKey = "Id";

    public $table = 'drogueriaspersonas';
    



    public $fillable = [
        'Id',
        'DpAsociado',
        'DpDrogueria',
        'DpPersona'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'DpAsociado' => 'integer',
        'DpDrogueria' => 'integer',
        'DpPersona' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DpAsociado' => 'required',
        'DpDrogueria' => 'required',
        'DpPersona' => 'required'
    ];

    
}
