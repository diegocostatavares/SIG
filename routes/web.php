<?php
use App\Models\System\Routes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


if (!Cache::has('routes')) {

    $vet_routes = Routes::all();
    Cache::put('routes', $vet_routes, 60);
}

$vet_routes = Cache::get('routes');

$vet_routes_auth[0] = $vet_routes->filter(function ($value, $key) {
    return $value->auth == 0;
});

$vet_routes_auth[1] = $vet_routes->filter(function ($value, $key) {
    return $value->auth > 0;
});


//=============================================================
// ACESSOS DESPROTEGIDOS - PUBLICO
//=============================================================

foreach ($vet_routes_auth[0]->all() as $k_rota => $v_rota) {
    
    switch (strtolower($v_rota['method'])) {

        case 'post':
            Route::post($v_rota['link'], ['as'=>$v_rota['alias'], 'uses'=>$v_rota['uses']]);
            break;
        
        case 'get':
        default:
            Route::get($v_rota['link'], ['as'=>$v_rota['alias'], 'uses'=>$v_rota['uses']]);
            break;
    }
}

//=============================================================
// PROTEGIDOS COM AUTENTICACAO E AUTORIZACAO
//=============================================================

Route::middleware(['auth', 'can:auth_permission'])->group(function () use($vet_routes_auth) {

    foreach ($vet_routes_auth[1]->all() as $k_rota => $v_rota) {

        switch (strtolower($v_rota['method'])) {

            case 'post':
                Route::post($v_rota['link'], ['as'=>$v_rota['alias'], 'uses'=>$v_rota['uses']]);
                break;
            
            case 'get':
            default:
                Route::get($v_rota['link'], ['as'=>$v_rota['alias'], 'uses'=>$v_rota['uses']]);
                break;
        }
    }
});