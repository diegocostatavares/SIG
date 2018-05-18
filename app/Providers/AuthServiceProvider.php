<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Permission;
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
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {

            if ($user->isSuperAdmin()) {
                return true;
            }
        });
        
        Gate::define('auth', function ($user, $alias=NULL) {

            if (!Cache::has('auth_permissions')) {

                $vet_permission_name = [];

                foreach ($this->getPermissions() as $permission) {

                    if($user->hasRole($permission->roles)){

                        $vet_permission_name[] = $permission->name;
                    };

                }

                Cache::put('auth_permissions', $vet_permission_name, 1);
            }

            $vet_permission_name = Cache::get('auth_permissions');

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

    /**
     * Get all permissions
     * @return array
     */
    protected function getPermissions()
    {
        try {
            return Permission::with('roles')->get();
        } catch(\Exception $e) {
            return [];
        }
    }

}
