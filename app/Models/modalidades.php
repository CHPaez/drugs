<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class modalidades
 * @package App\Models
 * @version May 22, 2024, 7:07 am UTC
 *
 * @property bigIncrements $Id
 * @property string $MoNombre
 */
class modalidades extends Model
{
    public $primaryKey = "Id";

    public $table = 'modalidades';
    



    public $fillable = [
        'Id',
        'MoNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'MoNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'MoNombre' => 'required'
    ];

    
}
