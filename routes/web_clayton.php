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

/*
Route::get('/', function () {
    return view('site.index');
});
*/
Auth::routes();

Route::get('/', ['as'=>'home', 'uses'=>'Site\HomeController@index']);
Route::get('/hotel', ['as'=>'site.hotel', 'uses'=>'Site\ConteudoController@pousada']);
Route::get('/tarifarios', ['as'=>'site.tarifarios', 'uses'=>'Site\ConteudoController@tarifarios']);
Route::get('/roteiros', ['as'=>'site.roteiros', 'uses'=>'Site\roteirosController@index']);
Route::get('/passeios', ['as'=>'site.passeios', 'uses'=>'Site\PasseiosController@index']);
Route::get('/contato', ['as'=>'site.contato', 'uses'=>'Site\ContatosController@index']);
Route::post('/contato', ['as'=>'site.contato.envia', 'uses'=>'Site\ContatosController@envia']);






/// tudo dentro desse grupo esta protegido com autenticação
Route::group(['middleware'=>'auth'], function(){
    
    Route::get('/admin', ['as'=>'admin.dashboard', 'uses'=>'Admin\AdminController@index']);
    
    //// ROTAS CRUD CANAIS
    Route::get('/admin/conteudo/canais', ['as'=>'admin.conteudo.canais', 'uses'=>'Admin\Conteudo\CanaisController@index']);
    Route::get('/admin/conteudo/canais/cadastrar', ['as'=>'admin.conteudo.canais.cadastrar', 'uses'=>'Admin\Conteudo\CanaisController@cadastrar']);
    Route::post('/admin/conteudo/canais/cadastrar', ['as'=>'admin.conteudo.canais.salvar', 'uses'=>'Admin\Conteudo\CanaisController@salvar']);
    Route::get('/admin/conteudo/canais/editar/{id}', ['as'=>'admin.conteudo.canais.editar', 'uses'=>'Admin\Conteudo\CanaisController@editar']);
    Route::get('/admin/conteudo/canais/excluir/{id}', ['as'=>'admin.conteudo.canais.excluir', 'uses'=>'Admin\Conteudo\CanaisController@excluir']);
    
    //// ROTAS CRUD DESTAQUES
    Route::get('/admin/conteudo/destaques', ['as'=>'admin.conteudo.destaques', 'uses'=>'Admin\Conteudo\DestaquesController@index']);
    Route::get('/admin/conteudo/destaques/cadastrar', ['as'=>'admin.conteudo.destaques.cadastrar', 'uses'=>'Admin\Conteudo\DestaquesController@cadastrar']);
    Route::post('/admin/conteudo/destaques/cadastrar', ['as'=>'admin.conteudo.destaques.salvar', 'uses'=>'Admin\Conteudo\DestaquesController@salvar']);
    Route::get('/admin/conteudo/destaques/editar/{id}', ['as'=>'admin.conteudo.destaques.editar', 'uses'=>'Admin\Conteudo\DestaquesController@editar']);
    Route::get('/admin/conteudo/destaques/excluir/{id}', ['as'=>'admin.conteudo.destaques.excluir', 'uses'=>'Admin\Conteudo\DestaquesController@excluir']);
    
    //// ROTAS CRUD DEPOIMENTOS
    Route::get('/admin/conteudo/depoimentos', ['as'=>'admin.conteudo.depoimentos', 'uses'=>'Admin\Conteudo\DepoimentosController@index']);
    Route::get('/admin/conteudo/depoimentos/cadastrar', ['as'=>'admin.conteudo.depoimentos.cadastrar', 'uses'=>'Admin\Conteudo\DepoimentosController@cadastrar']);
    Route::post('/admin/conteudo/depoimentos/cadastrar', ['as'=>'admin.conteudo.depoimentos.salvar', 'uses'=>'Admin\Conteudo\DepoimentosController@salvar']);
    Route::get('/admin/conteudo/depoimentos/editar/{id}', ['as'=>'admin.conteudo.depoimentos.editar', 'uses'=>'Admin\Conteudo\DepoimentosController@editar']);
    Route::get('/admin/conteudo/depoimentos/excluir/{id}', ['as'=>'admin.conteudo.depoimentos.excluir', 'uses'=>'Admin\Conteudo\DepoimentosController@excluir']);
    
    //// ROTAS CRUD PASSEIOS
    Route::get('/admin/roteiros/passeios', ['as'=>'admin.roteiros.passeios.listar', 'uses'=>'Admin\Roteiros\PasseiosController@index']);
    Route::get('/admin/roteiros/passeios/cadastrar', ['as'=>'admin.roteiros.passeios.cadastrar', 'uses'=>'Admin\Roteiros\PasseiosController@cadastrar']);
    Route::post('/admin/roteiros/passeios/cadastrar', ['as'=>'admin.roteiros.passeios.salvar', 'uses'=>'Admin\Roteiros\PasseiosController@salvar']);
    Route::get('/admin/roteiros/passeios/editar/{id}', ['as'=>'admin.roteiros.passeios.editar', 'uses'=>'Admin\Roteiros\PasseiosController@editar']);
    Route::get('/admin/roteiros/passeios/excluir/{id}', ['as'=>'admin.roteiros.passeios.excluir', 'uses'=>'Admin\Roteiros\PasseiosController@excluir']);
    
    //// ROTAS CRUD APARTAMENTOS
    Route::get('/admin/roteiros/apartamentos', ['as'=>'admin.roteiros.apartamentos.listar', 'uses'=>'Admin\Roteiros\ApartamentosController@index']);
    Route::get('/admin/roteiros/apartamentos/cadastrar', ['as'=>'admin.roteiros.apartamentos.cadastrar', 'uses'=>'Admin\Roteiros\ApartamentosController@cadastrar']);
    Route::post('/admin/roteiros/apartamentos/cadastrar', ['as'=>'admin.roteiros.apartamentos.salvar', 'uses'=>'Admin\Roteiros\ApartamentosController@salvar']);
    Route::get('/admin/roteiros/apartamentos/editar/{id}', ['as'=>'admin.roteiros.apartamentos.editar', 'uses'=>'Admin\Roteiros\ApartamentosController@editar']);
    Route::get('/admin/roteiros/apartamentos/excluir/{id}', ['as'=>'admin.roteiros.apartamentos.excluir', 'uses'=>'Admin\Roteiros\ApartamentosController@excluir']);
    
    /// ROTAS CRUD ALTA TEMPORADA
    Route::get('/admin/roteiros/altatemporada', ['as'=>'admin.roteiros.altatemporada.listar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@index']);
    Route::get('/admin/roteiros/altatemporada/cadastrar', ['as'=>'admin.roteiros.altatemporada.cadastrar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@cadastrar']);
    Route::post('/admin/roteiros/altatemporada/cadastrar', ['as'=>'admin.roteiros.altatemporada.salvar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@salvar']);
    Route::get('/admin/roteiros/altatemporada/editar/{id}', ['as'=>'admin.roteiros.altatemporada.editar', 'uses'=>'Admin\Roteiros\AltaTemporadaController@editar']);
    Route::get('/admin/roteiros/altatemporada/excluir/{id}', ['as'=>'admin.roteiros.altatemporada.excluir', 'uses'=>'Admin\Roteiros\AltaTemporadaController@excluir']);
    
    
    Route::get('/register', 'Auth\RegisterController@index')->name('register');
    
} );