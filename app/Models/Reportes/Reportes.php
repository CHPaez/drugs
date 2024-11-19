<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    public $primaryKey = "Reid";
    public static $rules = [
       
    ];
    
    protected $fillable = [
        'ReDataCollection','ReTarget','ReFiltro','ReSalida'
    ];
}
