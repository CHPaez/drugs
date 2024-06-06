<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class programas
 * @package App\Models
 * @version May 22, 2024, 5:55 am UTC
 *
 * @property bigIncrements $Id
 * @property string $PrNombre
 */
class programas extends Model
{
    public $primaryKey = "Id";

    public $table = 'programas';
    



    public $fillable = [
        'Id',
        'PrNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'PrNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'PrNombre' => 'required'
    ];

    
}
