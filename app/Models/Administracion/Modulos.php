<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;
    public $primaryKey = "id";
    public static $rules = [
       
    ];
    
    protected $fillable = [
        'MoNombre','MoRoute','MoSubmodulo'
    ];
}
