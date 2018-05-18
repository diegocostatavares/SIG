<?php

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


//=============================================================
// ACESSOS DESPROTEGIDOS - PUBLICO
//=============================================================
Route::get('/',             ['as'=>'home',               'uses'=>'Site\HomeController@index']);
Route::get('/hotel',        ['as'=>'site.hotel',         'uses'=>'Site\ConteudoController@pousada']);
Route::get('/tarifarios',   ['as'=>'site.tarifarios',    'uses'=>'Site\ConteudoController@tarifarios']);
Route::get('/roteiros',     ['as'=>'site.roteiros',      'uses'=>'Site\roteirosController@index']);
Route::get('/passeios',     ['as'=>'site.passeios',      'uses'=>'Site\PasseiosController@index']);
Route::get('/contato',      ['as'=>'site.contato',       'uses'=>'Site\ContatosController@index']);
Route::post('/contato',     ['as'=>'site.contato.envia', 'uses'=>'Site\ContatosController@envia']);

Route::get('/logout',       ['as'=>'logout',             'uses'=>'Auth\LoginController@logout']);

//=============================================================
// PROTEGIDOS COM AUTENTICACAO E AUTORIZACAO
//=============================================================
Route::middleware(['auth', 'can:auth'])->group(function () {

    //=============================================================
    // MODULO BASE - ADMIN
    //=============================================================
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', ['as'=>'admin.dashboard', 'uses'=>'Admin\AdminController@index']);


        //=============================================================
        // MODULO ROOT
        //=============================================================
        Route::group(['prefix' => 'root'], function () {

            Route::get('/', ['as'=>'admin.root', 'uses'=>'Admin\Root\HomeController@index']);

            //=============================================================
            // USUARIOS
            //=============================================================
            Route::group(['prefix' => 'usuarios'], function () {

                Route::get('/', ['as'=>'admin.root.usuarios', 'uses'=>'Admin\Root\UsersController@index']);
                Route::get('cadastrar', ['as'=>'admin.root.usuarios.cadastrar', 'uses'=>'Admin\Root\UsersController@cadastrar']); 
                Route::post('cadastrar', ['as'=>'admin.root.usuarios.salvar', 'uses'=>'Admin\Root\UsersController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.root.usuarios.editar', 'uses'=>'Admin\Root\UsersController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.root.usuarios.excluir', 'uses'=>'Admin\Root\UsersController@excluir']);
            });
        });


        //=============================================================
        // MODULO CONTEUDO
        //=============================================================
        Route::group(['prefix' => 'conteudo'], function () {

            //=============================================================
            // CANAIS
            //=============================================================
            Route::group(['prefix' => 'canais'], function () {

                Route::get('/', ['as'=>'admin.conteudo.canais', 'uses'=>'Admin\Conteudo\CanaisController@index']);
                Route::get('cadastrar', ['as'=>'admin.conteudo.canais.cadastrar', 'uses'=>'Admin\Conteudo\CanaisController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.conteudo.canais.salvar', 'uses'=>'Admin\Conteudo\CanaisController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.conteudo.canais.editar', 'uses'=>'Admin\Conteudo\CanaisController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.conteudo.canais.excluir', 'uses'=>'Admin\Conteudo\CanaisController@excluir']);
            });

            //=============================================================
            // DESTAQUES
            //=============================================================
            Route::group(['prefix' => 'destaques'], function () {

                Route::get('/', ['as'=>'admin.conteudo.destaques', 'uses'=>'Admin\Conteudo\DestaquesController@index']);
                Route::get('cadastrar', ['as'=>'admin.conteudo.destaques.cadastrar', 'uses'=>'Admin\Conteudo\DestaquesController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.conteudo.destaques.salvar', 'uses'=>'Admin\Conteudo\DestaquesController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.conteudo.destaques.editar', 'uses'=>'Admin\Conteudo\DestaquesController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.conteudo.destaques.excluir', 'uses'=>'Admin\Conteudo\DestaquesController@excluir']);
            });

            //=============================================================
            // DEPOIMENTOS
            //=============================================================
            Route::group(['prefix' => 'depoimentos'], function () {

                Route::get('/', ['as'=>'admin.conteudo.depoimentos', 'uses'=>'Admin\Conteudo\DepoimentosController@index']);
                Route::get('cadastrar', ['as'=>'admin.conteudo.depoimentos.cadastrar', 'uses'=>'Admin\Conteudo\DepoimentosController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.conteudo.depoimentos.salvar', 'uses'=>'Admin\Conteudo\DepoimentosController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.conteudo.depoimentos.editar', 'uses'=>'Admin\Conteudo\DepoimentosController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.conteudo.depoimentos.excluir', 'uses'=>'Admin\Conteudo\DepoimentosController@excluir']);

            });

        });

        //=============================================================
        // MODULO ROTEIROS
        //=============================================================
        Route::group(['prefix' => 'roteiros'], function () {

            //=============================================================
            // PASSEIOS
            //=============================================================
            Route::group(['prefix' => 'passeios'], function () {

                Route::get('/', ['as'=>'admin.roteiros.passeios.listar', 'uses'=>'Admin\Roteiros\PasseiosController@index']);
                Route::get('cadastrar', ['as'=>'admin.roteiros.passeios.cadastrar', 'uses'=>'Admin\Roteiros\PasseiosController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.roteiros.passeios.salvar', 'uses'=>'Admin\Roteiros\PasseiosController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.roteiros.passeios.editar', 'uses'=>'Admin\Roteiros\PasseiosController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.roteiros.passeios.excluir', 'uses'=>'Admin\Roteiros\PasseiosController@excluir']);

            });

            //=============================================================
            // APARTAMENTOS
            //=============================================================
            Route::group(['prefix' => 'apartamentos'], function () {

                Route::get('/', ['as'=>'admin.roteiros.apartamentos.listar', 'uses'=>'Admin\Roteiros\ApartamentosController@index']);
                Route::get('cadastrar', ['as'=>'admin.roteiros.apartamentos.cadastrar', 'uses'=>'Admin\Roteiros\ApartamentosController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.roteiros.apartamentos.salvar', 'uses'=>'Admin\Roteiros\ApartamentosController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.roteiros.apartamentos.editar', 'uses'=>'Admin\Roteiros\ApartamentosController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.roteiros.apartamentos.excluir', 'uses'=>'Admin\Roteiros\ApartamentosController@excluir']);
            });

            //=============================================================
            // ALTA TEMPORADA
            //=============================================================
            Route::group(['prefix' => 'altatemporada'], function () {

                Route::get('/', ['as'=>'admin.roteiros.altatemporada.listar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@index']);
                Route::get('cadastrar', ['as'=>'admin.roteiros.altatemporada.cadastrar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@cadastrar']);
                Route::post('cadastrar', ['as'=>'admin.roteiros.altatemporada.salvar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@salvar']);
                Route::get('editar/{id}', ['as'=>'admin.roteiros.altatemporada.editar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@editar']);
                Route::get('excluir/{id}', ['as'=>'admin.roteiros.altatemporada.excluir', 'uses'=>'Admin\Roteiros\AltaTemporadaController@excluir']);
            });

        });

    });

    // Route::get('/register', 'Auth\RegisterController@index')->name('register');
   
   // $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
   //  $this->post('register', 'Auth\RegisterController@register');

} );