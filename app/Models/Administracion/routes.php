<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routes extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'url','modulo','submodulo','method','alias'
    ];
}
