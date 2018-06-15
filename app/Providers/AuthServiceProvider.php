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
            print '<pre>';

            $route_action_vet = Route::current()->getAction();


            $route_namespace = $route_action_vet['namespace'];
            $route_namespace_controller_action = $route_action_vet['controller'];
            $route_namespace_controller_action_vet = explode('@', $route_namespace_controller_action, 2);

            $route_controller = explode('/', str_replace('\\', '/', head($route_namespace_controller_action_vet)), 2);

            $route_action = last($route_namespace_controller_action_vet);


            dd($route_action_vet); 
            exit();


            print 'namespace '; var_dump( $route_action_vet['namespace'] ); print '<hr>';
            print 'controller '; var_dump( $route_action_vet['controller'] ); print '<hr>';

            $aaa = explode('@', $route_action_vet['controller'], 2);
            print 'aaa '; var_dump( $aaa ); print '<hr>';


            $pastas = str_replace($route_action_vet['namespace'].'\\', '', $route_action_vet['controller']);
            print 'pastas '; var_dump( $pastas ); print '<hr>';

            exit();


            $routeArray = Str::parseCallback(Route::currentRouteAction(), null);


            $controller = str_replace('Controller', '', class_basename(head($routeArray)));
            print 'controller '; var_dump( $controller ); print '<hr>';
            
            //dd (class_basename(head($routeArray)));

            var_dump( Route::currentRouteAction() );
            print '<hr>';

            var_dump( $routeArray );
            print '<hr>';

            if (last($routeArray) != null) {
                

                $controller = str_replace('Controller', '', class_basename(head($routeArray)));
                print 'controller '; var_dump( $controller );
                print '<hr>';

                $action = head($routeArray);
                print 'caminho + controller '; var_dump( $action );
                print '<hr>';
                
                $action = last($routeArray);
                print 'action '; var_dump( $action );
                print '<hr>';

                var_dump(  Str::slug($controller . '-' . $action) );

            }

            dd( '<hr>' );
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

                if (in_array( $alias, ['home'] )) {
                    return true;
                }

                if (in_array( $alias, ['template'] )) {
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
