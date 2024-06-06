<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class horarios
 * @package App\Models
 * @version May 22, 2024, 7:05 am UTC
 *
 * @property bigIncrements $Id
 * @property string $HoNombre
 */
class horarios extends Model
{

    public $primaryKey = "Id";
    public $table = 'horarios';
    



    public $fillable = [
        'Id',
        'HoNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'HoNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'HoNombre' => 'required'
    ];

    
}
