<?php
use App\Models\System\Routes;
use Illuminate\Support\Facades\Cache;

//=============================================================
// FALLBACK ROUTE - MELHORADO
//=============================================================

Route::get('sys_error_403',['as'=>'sys_error_403','uses'=>'ErrorHandlerController@errorCode403']);
Route::get('sys_error_404',['as'=>'sys_error_404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('sys_error_500',['as'=>'sys_error_500','uses'=>'ErrorHandlerController@errorCode500']);
Route::get('sys_error_default',['as'=>'sys_error_default','uses'=>'ErrorHandlerController@errorCodeDefault']);


//=============================================================
// ROTA PRINCIPAL
//=============================================================

Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']); 


//=============================================================
// MONTA ROTAS PADRONIZADOS DO LARAVEL - AUTH
//=============================================================

/*
// Auth::routes();
// A FUNÇÃO ACIMA SUBSTITUI TODAS ESTAS TODAS COMENTADAS...
// COLOQUEI COMO REFERENCIA... POIS FORAM MODIFICADAS LOGO ABAIXO.

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/

// ROTAS AUTH MODIFICADAS
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.g');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\LoginController@logout')->name('register');
Route::post('register', 'Auth\LoginController@logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



// ROTAS TROCAR MINHA SENHA - USUARIO LOGADO - AUTENTICADO
Route::middleware(['auth'])->group(function ()
{
    Route::get('trocasenha', 'Admin\UsuariosController@view_trocasenha_user_atual')->name('trocasenha');
    Route::post('trocasenha', 'Admin\UsuariosController@salva_trocasenha_user_atual')->name('salvatrocasenha');
    Route::get('perfil', 'Admin\UsuariosController@view_meuPerfil')->name('perfil');
});


// ROTA - AJAX - USUARIO LOGADO - AUTENTICADO
Route::middleware(['auth'])->group(function ()
{
    Route::get('ajax/{module}/{action}', function($module, $action) {

        return App::call('App\\Http\\Controllers\\'.$module.'\\AjaxController@'.$action);
    });
    Route::post('ajax/{module}/{action}', function($module, $action) {

        return App::call('App\\Http\\Controllers\\'.$module.'\\AjaxController@'.$action);
    });
});

//=============================================================
// MONTA CACHE DE ROTAS PERMANENTE - CADASTRADAS EM DATABASE
//=============================================================

if (!Cache::has('sys_routes')) {

    $vet_routes = Routes::all();
    Cache::forever('sys_routes', $vet_routes);
}

$vet_routes = Cache::get('sys_routes');

$vet_routes_auth[0] = $vet_routes->filter(function ($value, $key) {
    return $value->auth == 0;
});

$vet_routes_auth[1] = $vet_routes->filter(function ($value, $key) {
    return $value->auth > 0;
});


//=============================================================
// MONTA CACHE DE ROTAS PERMANENTE - NOME DE ROTAS - SÓ ROOT
// USO NO AuthServiceProvider 
//=============================================================

if (!Cache::has('sys_routes_root')) {

    $vet_routes_root = [];
    $vet_routes_root_obj = Routes::select('name')->where(['somente_root'=>'1'])->get();

    foreach ($vet_routes_root_obj as $vet_routes_root_obj_k => $vet_routes_root_obj_v) {
        $vet_routes_root[] = $vet_routes_root_obj_v->name; 
    }

    Cache::forever('sys_routes_root', $vet_routes_root);
}


//=============================================================
// ACESSOS DESPROTEGIDOS - CADASTRADAS EM DATABASE - PUBLICO
//=============================================================

foreach ($vet_routes_auth[0]->all() as $k_rota => $v_rota) {
    
    $metodo = strtolower($v_rota['method']);
    $metodo = in_array($metodo, ['get','post','put','patch','delete','options','resource']) ? $metodo : 'get';

    call_user_func(['Route', $v_rota['method']], 
            $v_rota['link'],
            [
                'as' => $v_rota['name'], 
                'uses' => $v_rota['module'].'\\'.$v_rota['controller'].'@'.$v_rota['action']
            ]
        );
}


//=============================================================
// PROTEGIDOS COM AUTENTICACAO E AUTORIZACAO - CADASTRADAS DB
//=============================================================

Route::middleware(['auth', 'can:auth_permission'])->group(function () use($vet_routes_auth) {

    foreach ($vet_routes_auth[1]->all() as $k_rota => $v_rota) {

        $metodo = strtolower($v_rota['method']);
        $metodo = in_array($metodo, ['get','post','put','patch','delete','options','resource']) ? $metodo : 'get';

        call_user_func(['Route', $v_rota['method']], 
                $v_rota['link'],
                [
                    'as' => $v_rota['name'], 
                    'uses' => $v_rota['module'].'\\'.$v_rota['controller'].'@'.$v_rota['action']
                ]
            );
    }
});