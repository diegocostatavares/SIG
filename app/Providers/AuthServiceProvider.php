<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Auth\CachingUserProvider;
use Illuminate\Support\Facades\Auth;

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

            if(Auth::user()->roles->contains('name','root')) {

                return true;
            }
        }); 

        //=============================================================
        // VALIDA PERMISSOES DE USUARIO LOGADO
        //=============================================================
        Gate::define('auth_permission', function ($user, $alias=NULL) {

            $vet_permission_name = $this->getPermissions_array();

            if ($alias==NULL) {

                $action = Route::current()->getAction();

                
                if (!isset($action['as'])) {

                    return false;
                }
                else{

                    $alias = $action['as'];
                }
            }


            if (in_array($alias, $vet_permission_name)) {

                return true;
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
