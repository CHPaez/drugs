<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class indicativosciudades
 * @package App\Models
 * @version April 4, 2024, 1:49 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $IcCiudad
 * @property integer $IcIndicativo
 */
class indicativosciudades extends Model
{


    public $table = 'indicativosciudades';
    



    public $fillable = [
        'Id',
        'IcCiudad',
        'IcIndicativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'IcCiudad' => 'integer',
        'IcIndicativo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'IcCiudad' => 'required',
        'IcIndicativo' => 'required'
    ];


    public function ciudades()
    {
        return $this->hasOne('App\Models\ciudades', 'id','IcCiudad');
    }
    
}
