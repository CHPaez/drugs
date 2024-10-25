<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles_Permisos extends Model
{
    use HasFactory;

    protected $table = 'roles_permisos';

    protected $fillable = [
        'Modulos_id','Roles_id','Read','Update','Create','Delete','Estado'
    ];
}
