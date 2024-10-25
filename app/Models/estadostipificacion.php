<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class estadostipificacion
 * @package App\Models
 * @version May 22, 2024, 6:03 am UTC
 *
 * @property bigIncrements $Id
 * @property string $EtNombre
 */
class estadostipificacion extends Model
{ 

    public $primaryKey = "Id";
    public $table = 'estadostipificacions';
    



    public $fillable = [
        'Id',
        'EtNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'EtNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'EtNombre' => 'required'
    ];

    
}
