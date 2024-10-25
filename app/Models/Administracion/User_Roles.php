<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Roles extends Model
{
    use HasFactory;

    protected $table = 'usuarios_roles';

    protected $fillable = ['Users_id','Roles_id'];
}
