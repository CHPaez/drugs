<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public static $rules = [
    ];

    protected $fillable = ['RoNombre','RoDescripcion'];
}
