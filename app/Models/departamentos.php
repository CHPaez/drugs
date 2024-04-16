<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class departamentos
 * @package App\Models
 * @version April 3, 2024, 5:27 am UTC
 *
 * @property bigIncrements $Id
 * @property integer $DepPais
 * @property string $DepDepartamento
 */
class departamentos extends Model
{


    public $table = 'departamentos';
    



    public $fillable = [
        'Id',
        'DepPais',
        'DepDepartamento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'DepPais' => 'integer',
        'DepDepartamento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DepPais' => 'required',
        'DepDepartamento' => 'required'
    ]; 


    public function paises()
    {
        return $this->hasOne('App\Models\paises', 'id','DepPais');
    }
    
}
