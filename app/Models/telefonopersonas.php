<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class telefonopersonas
 * @package App\Models
 * @version April 4, 2024, 1:59 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $TePersona
 * @property integer $TeTipo
 * @property integer $TeIndicativo
 * @property integer $TeTelefono
 */
class telefonopersonas extends Model
{

    public $primaryKey = "id";
    public $table = 'telefonopersonas';
    



    public $fillable = [
        'Id',
        'TePersona',
        'TeTipo',
        'TeIndicativo',
        'TeTelefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TePersona' => 'integer',
        'TeTipo' => 'integer',
        'TeIndicativo' => 'integer',
        'TeTelefono' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TePersona' => 'required',
        'TeTipo' => 'required',
        'TeIndicativo' => 'required',
        'TeTelefono' => 'required'
    ];

    
}
