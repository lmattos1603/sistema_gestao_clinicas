<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
	/*Clientes*/
	Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('cliente_cadastro');
	Route::post('/cliente/incluir', 'ClienteController@incluir')->name('cliente_add');
	Route::get("/cliente/alterar/{id}", "ClienteController@telaAlteracao")->name('cliente_tela_alterar');
	Route::post("/cliente/alterar/{id}", "ClienteController@alterar")->name('cliente_alterar');
	Route::get('/cliente/excluir/{id}', "ClienteController@excluir")->name('cliente_delete');

/*Rotas para tela cadastro*/
Route::get('/convenio/cadastro', 'ConvenioController@telaCadastro')->name('convenio_cadastro');
Route::get('/especialidade/cadastro', 'EspecialidadeController@telaCadastro')->name('especialidade_cadastro');
Route::get('/profissional/cadastro', 'ProfissionalController@telaCadastro')->name('profissional_cadastro');

/*Rotas para inclusao*/
	Route::post('/convenio/cadastro', 'ConvenioController@incluir')->name('convenio_add');
	Route::post('/especialidade/cadastro', 'EspecialidadeController@incluir')->name('especialidade_add');
	Route::post('/profissional/cadastro', 'ProfissionalController@incluir')->name('profissional_add');
	
/*Rotas para alteração*/
	Route::get("/convenio/alterar/{id}", "ConvenioController@telaAlteracao")->name('convenio_tela_alterar');
	Route::get("/especialidade/alterar/{id}", "EspecialidadeController@telaAlteracao")->name('especialidade_tela_alterar');
	Route::get("/profissional/alterar/{id}", "ProfissionalController@telaAlteracao")->name('profissional_tela_alterar');
?>
