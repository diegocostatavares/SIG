<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Auth\CachingUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
    ];

    public function boot()
    {
        $this->registerPolicies();

        //=============================================================
        // REGISTRA E MONTA CACHE AUTH - USUARIO LOGADO
        //=============================================================
        Auth::provider('caching', function ($app, array $config) {
            
            return new CachingUserProvider(

                //https://matthewdaly.co.uk/blog/2018/01/12/creating-a-caching-user-provider-for-laravel/
                $app->make('Illuminate\Contracts\Hashing\Hasher'),
                $config['model'],
                $app->make('Illuminate\Contracts\Cache\Repository')
            );
        });


        //=============================================================
        // ANTES DE DEFINIR PERMISSOES, VERIFICA SE USUARIO É ROOT
        // SE FOR SUPER USUARIO, LIBERA TUDO AGORA MESMO.
        //=============================================================
        Gate::before(function ($user, $ability) {

/*
            $route_action_vet = Route::current()->getAction();

            $getActionNamespace = Route::current()->getAction()['namespace'];

            $controllerFull = $route_action_vet['controller'];

            $controllerNameAndAction = class_basename($controllerFull);
            list($controllerName, $actionName) = explode('@', $controllerNameAndAction);

            $subModulos = str_replace($getActionNamespace, '', str_replace($controllerNameAndAction, '', $controllerFull));
            $subModulos = explode('\\', $subModulos);
            $subModulos = array_filter($subModulos);

            $getModule = head($subModulos);
            $subModulos = array_values($subModulos);
            unset($subModulos[0]);

            dd($subModulos);
*/
            
            if(Auth::user()->isRoot()) {
                return true;
            }
        }); 

        //=============================================================
        // VALIDA PERMISSOES DE USUARIO LOGADO
        //=============================================================
        Gate::define('auth_permission', function ($user, $alias=NULL) {

            $vet_permission_name = $this->getPermissions_array();

            if ($alias==NULL) {

                $name_route = Route::current()->getName();                
                
                if (!isset($name_route)) {
                    return false;
                }
                else{
                    $alias = $name_route;
                }
            }

            if(Auth::user()->isAdmin()) {

                $routeSomenteROOT = Cache::get('sys_routes_root');

                if (in_array($alias, $routeSomenteROOT)) {
                    return false;
                }

                return true;
            }
            else{

                if (in_array( $alias, ['home','template'] )) {
                    return true;
                }

                if (in_array($alias, $vet_permission_name)) {
                    return true;
                }
            }

            return false;
            
        });
    }


    public function getPermissions_array()
    {
        $return = [];

        foreach (Auth::user()->roles as $k_roles => $v_roles) {

            foreach ($v_roles->permissions as $permission) {
                $return[] = $permission->name;
            }
        }

        return $return;
    }
}
