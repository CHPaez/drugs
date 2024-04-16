<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class asociados
 * @package App\Models
 * @version March 28, 2024, 12:20 am UTC
 *
 * @property bigIncrements $Id
 * @property string $AsCodigo
 */
class asociados extends Model
{


    public $table = 'asociados';
    



    public $fillable = [
        'Id',
        'AsCodigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'AsCodigo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'AsCodigo' => 'required'
    ];

    
    public function drogueriaspersonas()
    {
        return $this->hasOne('App\Models\drogueriaspersonas', 'id','id');
    }

}
