<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Permission;
use App\User;
use View;
//use Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        //=============================================================
        // REGISTRANDO POLITICAS
        //=============================================================

        $this->registerPolicies();


        //=============================================================
        // ANTES DE DEFINIR PERMISSOES, VERIFICA SE USUARIO É ROOT
        // SE FOR SUPER USUARIO, LIBERA TUDO AGORA MESMO.
        //=============================================================
        Gate::before(function ($user, $ability) {

            if($user->roles->contains('name','root')) {

                return true;
            }
        }); 
        

        //=============================================================
        // VALIDA PERMISSOES DE USUARIO LOGADO
        //=============================================================
        Gate::define('auth', function ($user, $alias=NULL) {

            $vet_permission_name = [];

            foreach ($user->roles as $k_roles => $v_roles) {

                foreach ($v_roles->permissions as $permission) {

                        $vet_permission_name[] = $permission->name;
                }
            }


            if ($alias==NULL) {
                
                $action = Route::current()->getAction();

                if (!isset($action['as'])) {
                    
                    abort(403, 'Acesso não Autorizado!');
                    return false;
                }
                else{

                    $alias = $action['as'];
                }

                if (in_array($alias, $vet_permission_name)) {

                    return true;
                }

                // $msg  = "Ops... ". strtoupper($user->name) .", acesso nao autorizado nessa rota: " . $alias . "." ;
                // $msg .= " Seu perfil é: \n" . implode("\n", $vet_permission_name);
                // View::share('msg', $msg);
                abort(403, 'Acesso não Autorizado!');
                return false;

            }
        });
    }

}
