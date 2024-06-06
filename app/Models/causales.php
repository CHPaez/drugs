<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;


 
/**
 * Class causales
 * @package App\Models
 * @version May 22, 2024, 6:25 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $CaTipificacion
 * @property string $CaNombre
 */
class causales extends Model
{

    public $primaryKey = "Id";
    public $table = 'causales';
    



    public $fillable = [
        'Id',
        'CaTipificacion',
        'CaNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'CaTipificacion' => 'integer',
        'CaNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'CaTipificacion' => 'required',
        'CaNombre' => 'required'
    ];

    
}
