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

	Route::middleware(['cliente'])->group(function (){
		
	});

	Route::middleware(['profissional'])->group(function (){
		/*Cadastro Cliente*/
		Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('cadastro_cliente');

		Route::post('/cliente/adicionar', 'ClienteController@clienteAdd')->name('cliente_add');

		Route::post('/cliente/{id}/adicionar_convenio', 'ClienteController@adicionarConvenio')->name('add_convenios');

		Route::get('/cliente/lista', 'ClienteController@telaListar')->name('listar_clientes');

		Route::get('/cliente/alterar/{id}', 'ClienteController@telaAlteracao')->name('cliente_update');
		Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')->name('cliente_alterar');	
		Route::get('/cliente/excluir/{id}', 'ClienteController@delete');

		/*Convenio*/
		Route::get('/convenio/cadastro', 'ConvenioController@telaCadastro')->name('cadastrar_convenio');

		Route::post('/convenio/adicionar', 'ConvenioController@convenioAdd')->name('convenio_add');
		Route::get('/convenio/alterar/{id}', 'ConvenioController@telaAlteracao')->name('convenio_update');
		Route::post('/convenio/alterar/{id}', 'ConvenioController@alterar')->name('convenio_alterar');	
		Route::get('/convenio/excluir/{id}', 'ConvenioController@delete');

		/*Profissional*/
		Route::get('/profissional/cadastro', 'ProfissionalController@telaCadastro')->name('cadastro_profissional');

		Route::post('/profissional/adicionar', 'ProfissionalController@profissionalAdd')->name('profissional_add');

		Route::get('/profissional/{id}/especialidades', 'ProfissionalController@telaAdicionarEspecialidade')->name('cadastro_especialidade');

		Route::post('/profissional/{id}/adicionar_especialidade', 'ProfissionalController@adicionarEspecialidade')->name('add_especialidades');

		Route::get('/profissional/alterar/{id}', 'ProfissionalController@telaAlteracao')->name('profissional_update');
		Route::post('/profissional/alterar/{id}', 'ProfissionalController@alterar')->name('profissional_alterar');	
		Route::get('/profissional/excluir/{id}', 'ProfissionalController@delete');

		/*Especialidade*/
		Route::get('/especialidade/cadastro', 'EspecialidadeController@telaCadastro')->name('cadastrar_especialidade');

		Route::post('/especialidade/adicionar', 'EspecialidadeController@especialidadeAdd')->name('especialidade_add');

		Route::get('/especialidade/alterar/{id}', 'EspecialidadeController@telaAlteracao')->name('especialidade_update');
		Route::post('/especialidade/alterar/{id}', 'EspecialidadeController@alterar')->name('especialidade_alterar');	
		Route::get('/especialidade/excluir/{id}', 'EspecialidadeController@delete');
		Route::get('/especialidade/listar', 'EspecialidadeController@telaListar')->name('listar_especialidade');

		/*Agenda*/
		Route::get('/agenda/lista', 'AgendaController@telaLista')->name('lista_agenda');		

		Route::get('/agenda/{id}/buscar', 'AgendaController@telaAlterar')->name('tela_alterar');

		Route::post('/agenda/{id}/alterar', 'AgendaController@alterar')->name('agenda_alterar');

		Route::get('/agenda/excluir/{id}', 'AgendaController@delete');
<<<<<<< HEAD

		Route::get('/agenda/cadastro', 'AgendaController@telaCadastro')->name('agenda_cadastro');
		
		Route::get('/dashboard/dia', 'ClienteController@dashboard')->name('dashboard');

		Route::get('/dashboard/mes', 'ClienteController@dashboardMensal')->name('dashboard_mensal');
	});

	Route::get('/especialidade/profissional/{id}', 'EspecialidadeController@especialidade_prof')->name('especialidade_prof');
=======
>>>>>>> 00c7db2a34cefd5a462c3fb38cf21d6271d33c01

		Route::get('/dashboard/dia', 'ClienteController@dashboard')->name('dashboard');

		Route::get('/dashboard/mes', 'ClienteController@dashboardMensal')->name('dashboard_mensal');
	});

	Route::get('/especialidade/profissional/{id}', 'EspecialidadeController@especialidade_prof')->name('especialidade_prof');

	/*Cliente*/
	Route::get('/cliente/listar', 'ClienteController@telaListarDados')->name('listar_cliente');

	/*Convenio*/
	Route::get('/convenio/listar', 'ConvenioController@telaListar')->name('listar_convenio');

	Route::get('/cliente/{id}/convenios', 'ClienteController@telaAdicionarConvenio')->name('cadastro_convenio');

	/*Profissionais*/
	Route::get('/profissional/listar', 'ProfissionalController@telaListar')->name('listar_profissional');

	/*Especialidade*/
	Route::get('/especialidade/menu/listar', 'EspecialidadeController@telaListarEspecialidadeMenu')->name('listar_menu_especialidade');

	/*Agenda*/
	Route::get('/agenda/listar', 'AgendaController@telaListar')->name('listar_agenda');	

	Route::get('/agenda/cliente/{id}/listar', 'AgendaController@telaListarCli')->name('listar_agenda_cliente');

	Route::get('/agenda/{id}/listar', 'AgendaController@telaListarProf')->name('listar_agenda_prof');

	Route::get('/agenda/cadastro/{id}/especialista', 'AgendaController@telaCadastroEsp')->name('agenda_cadastro_especialista');

	Route::post('/agenda/adicionar', 'AgendaController@agendaAdd')->name('agenda_add');

	Route::get('/logout', 'ClienteController@logout')->name('logout');

});

/*Login*/
Route::get('/', function(){
	return view("welcome");
})->name('home');

Route::get('/logar', 'ClienteController@telaLogin')->name('logar');

Auth::routes();

Route::get('/home', 'HomeController@index');
