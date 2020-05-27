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
    return view('tela_cadastro');
});

/*Clientes*/
/*Route::get('/cliente/logar', 'ClienteController@telaLogin');

Route::post('/cliente/login', 'ClienteController@logar')->name('login');*/

Route::get('/cliente/cadastro', 'ClienteController@telaCadastro');

Route::post('/cliente/adicionar', 'ClienteController@clienteAdd')->name('cliente_add');

Route::get('/cliente/listar', 'ClienteController@telaListar')->name('listar');

Route::get('/cliente/{id}/convenios', 'ClienteController@telaAdicionarConvenio')->name('cadastro_convenio');

Route::post('/cliente/{id}/adicionar_convenio', 'ClienteController@adicionarConvenio')->name('add_convenios');

/*Convenio*/

Route::get('/convenio/cadastro', 'ConvenioController@telaCadastro');

Route::post('/convenio/adicionar', 'ConvenioController@convenioAdd')->name('convenio_add');

Route::get('/convenio/listar', 'ConvenioController@telaListar')->name('listar');

/*Profissionais*/

Route::get('/profissional/cadastro', 'ProfissionalController@telaCadastro');

Route::post('/profissional/adicionar', 'ProfissionalController@profissionalAdd')->name('profissional_add');

Route::get('/profissional/listar', 'ProfissionalController@telaListar')->name('listar');

Route::get('/profissional/{id}/especialidades', 'ProfissionalController@telaAdicionarEspecialidade')->name('cadastro_especialidade');

Route::post('/profissional/{id}/adicionar_especialidade', 'ProfissionalController@adicionarEspecialidade')->name('add_especialidades');


/*Especialidade*/

Route::get('/especialidade/cadastro', 'EspecialidadeController@telaCadastro');

Route::post('/especialidade/adicionar', 'EspecialidadeController@especialidadeAdd')->name('especialidade_add');

Route::get('/especialidade/listar', 'EspecialidadeController@telaListar')->name('listar');

/*Agenda*/

Route::get('/agenda/cadastro', 'AgendaController@telaCadastro')->name('agenda_cadastro');

Route::post('/agenda/adicionar', 'AgendaController@agendaAdd')->name('agenda_add');

Route::get('/agenda/listar', 'AgendaController@telaListar')->name('listar');