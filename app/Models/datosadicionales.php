<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class datosadicionales
 * @package App\Models
 * @version May 22, 2024, 7:09 am UTC
 *
 * @property bigIncrements $Id
 * @property string $DaNombre
 */
class datosadicionales extends Model
{

    public $primaryKey = "Id";
    public $table = 'datosadicionales';
    



    public $fillable = [
        'Id',
        'DaNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'DaNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DaNombre' => 'required'
    ];

    
}
