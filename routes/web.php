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

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', 'ClienteController@logout')->name('logout');

	Route::get('/cliente/listar', 'ClienteController@telaListar')->name('listar_cliente');

	Route::get('/cliente/{id}/convenios', 'ClienteController@telaAdicionarConvenio')->name('cadastro_convenio');

	Route::post('/cliente/{id}/adicionar_convenio', 'ClienteController@adicionarConvenio')->name('add_convenios');

	/*Convenio*/

	Route::get('/convenio/cadastro', 'ConvenioController@telaCadastro')->name('cadastrar_convenio');

	Route::post('/convenio/adicionar', 'ConvenioController@convenioAdd')->name('convenio_add');

	Route::get('/convenio/listar', 'ConvenioController@telaListar')->name('listar_convenio');

	/*Profissionais*/

	Route::get('/profissional/cadastro', 'ProfissionalController@telaCadastro')->name('cadastro_profissional');

	Route::post('/profissional/adicionar', 'ProfissionalController@profissionalAdd')->name('profissional_add');

	Route::get('/profissional/listar', 'ProfissionalController@telaListar')->name('listar_profissional');

	Route::get('/profissional/{id}/especialidades', 'ProfissionalController@telaAdicionarEspecialidade')->name('cadastro_especialidade');

	Route::post('/profissional/{id}/adicionar_especialidade', 'ProfissionalController@adicionarEspecialidade')->name('add_especialidades');


	/*Especialidade*/

	Route::get('/especialidade/cadastro', 'EspecialidadeController@telaCadastro')->name('cadastrar_especialidade');

	Route::post('/especialidade/adicionar', 'EspecialidadeController@especialidadeAdd')->name('especialidade_add');

	Route::get('/especialidade/listar', 'EspecialidadeController@telaListar')->name('listar_especialidade');

	/*Agenda*/

	Route::get('/agenda/cadastro', 'AgendaController@telaCadastro')->name('agenda_cadastro');

	Route::post('/agenda/adicionar', 'AgendaController@agendaAdd')->name('agenda_add');

	Route::get('/agenda/listar', 'AgendaController@telaListar')->name('listar_agenda');

});

/*Login*/
Route::get('/', function(){
	return view("welcome");
});

Route::get('/logar', 'ClienteController@telaLogin')->name('logar');

Route::post('/login', 'ClienteController@logar')->name('login');

/*Cadastro Cliente*/
Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('cadastro_cliente');

Route::post('/cliente/adicionar', 'ClienteController@clienteAdd')->name('cliente_add');