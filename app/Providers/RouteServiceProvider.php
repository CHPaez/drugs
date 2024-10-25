<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    // Macro para definir los modulos desde el enrutador (web.php)
    Route::macro('module', function ($module, $callback) {
        $prefix = $module;
        Route::group(['module' => $module], $callback);
    });

     // Macro para definir los submodulos desde el enrutador (web.php)
    Route::macro('submodule', function ($submodule, $callback) {
        $prefix = strtolower(str_replace(' ', '-', $submodule));
        Route::group(['submodule' => $submodule], $callback);
    });

    //Limita la cantidad de solicitudes permitidas para el usuario
    $this->configureRateLimiting();

    //Carga las rutas dentro del middleware 
    $this->routes(function () {
        Route::middleware('web')
           ->namespace($this->namespace)
           ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configura la cantidad de solicitudes permitidas para la ruta registrada
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
