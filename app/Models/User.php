<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Client\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function tiene_permiso(string $accion): bool{
        $request = app(Request::class);
        return self::validar_permisos($accion,$request->path());
    }

    private static function validar_permisos(string $accion, string $uri): bool {

        $usuario = Auth::user();
        if(empty($usuario)){
            return false;
        }


        $usuario = DB::table('usuarios_roles as ur')
            ->leftJoin('roles_permisos as rp', 'rp.Roles_id', 'ur.Roles_id')
            ->leftJoin('modulos as m', 'm.id', 'rp.Modulos_id')
            ->leftJoin('routes as r', 'r.id', 'm.MoRoute')
            ->select('Update', 'Delete', 'Create')
            ->where([
                ['ur.Users_id', $usuario->id],
                ['r.url', $uri]
            ])->first();

        if(empty($usuario)){
            return false;
        }

        $matchs = [
            'guardar' => $usuario->Create ?? false,
            'actualizar' => $usuario->Update ?? false,
            'eliminar' => $usuario->Delete ?? false
        ];

        return isset($matchs[$accion]) ? $matchs[$accion] : false ;
    }
}
