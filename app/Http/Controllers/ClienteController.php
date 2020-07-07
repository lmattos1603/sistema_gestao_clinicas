<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Cliente;
use App\Agenda;
use App\Convenio;
use App\User;
use Auth;

class ClienteController extends Controller
{
    function telaLogin(){
        if(session()->has('email')){
            return redirect()->route('listar_cliente');
        }
    	return view('auth.login');
    }
    function telaAlteracao($id){
        $cliente = Cliente::find($id);

        return view("tela_alteracao_cliente", ["c" => $cliente ]);
    }

    function logout(){
        Auth::logout();

        return redirect()->route('logar');
    }

    function telaListarDados(){
    	$clientes = Cliente::all();

        foreach ($clientes as $cli) {
            if(Auth::user()->id_cliente == $cli->id){
                $cliente = $cli;
            }
        }

    	return view("tela_listar", [ "cli" => $cliente ]);
    }

    function telaListar(){
        $cliente = Cliente::all();

        return view("tela_lista_clientes", [ "clientes" => $cliente ]);
    }

    function telaCadastro(){
    	return view("tela_cadastro");
    }

    function clienteAdd(Request $req){
    	$nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $rg = $req->input('rg');
        $nascimento = $req->input('nascimento');
        $telefone = $req->input('telefone');
        $email = $req->input('email');
        $senha = $req->input('senha');

        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->rg = $rg;
        $cliente->nascimento = $nascimento;
        $cliente->telefone = $telefone;

        $cliente->save();

        $user = new User();
        $user->name = $nome;
        $user->email = $email;
        $user->password = Hash::make($senha);
        $user->tipo = 0;
        $user->id_cliente = $cliente->id;

        $user->save();

        return redirect()->route('listar_clientes');
    }

    function telaAdicionarConvenio($id){
        $clientes = Cliente::find($id);
        $convenios = Convenio::all();
    
        return view("tela_convenio_cliente", [ "clientes" => $clientes, "convenios" => $convenios ]);
    }

    function adicionarConvenio(Request $req, $id){
        $id_convenio = $req->input('id_convenio');

        $convenio = Convenio::find($id_convenio);
        $cliente = Cliente::find($id);

        $cliente->convenios()->attach($id_convenio);
        $cliente->save();

        return redirect()->route('cadastro_convenio', [ "id" => $cliente->id ]);
    }
    function alterar(Request $req, $id){
        $cliente = Cliente::find($id);
        $user = User::find($id);
        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $rg = $req->input('rg');
        $nascimento = $req->input('nascimento');
        $telefone = $req->input('telefone');
        $email = $req->input('email');
        $senha = $req->input('senha');

       
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->rg = $rg;
        $cliente->nascimento = $nascimento;
        $cliente->telefone = $telefone;

        $cliente->save();

        
        $user->name = $nome;
        $user->email = $email;
        $user->password = Hash::make($senha);
        $user->tipo = 0;
        $user->id_cliente = $cliente->id;

        $user->save();
        return redirect()->route('listar_clientes');
    }

    function delete($id){
        $cliente = Cliente::find($id);
        $user = User::all();
        foreach ($user as $us) {
            if ($us->id_cliente == $id) {
                $us->delete();
            }
        }

        if($cliente->delete()){
            $msg = "Cliente excluído com sucesso!";
            return redirect()->route('listar_clientes');
        }else{
            $msg = "Cliente não foi excluído!";
        }
    }
<<<<<<< HEAD

=======
>>>>>>> 00c7db2a34cefd5a462c3fb38cf21d6271d33c01
    function dashboard(){
    $agendamento_dia = Agenda::selectRaw("CONCAT(day(data), '/', month(data), '/', year(data)) as data, date(data), ROUND(COUNT(id), 2) as quantidade")->groupByRaw('data')->get();

        $usuarios_online = User::all()->count();

        return view('dashboard', ['agendamento_dia' => $agendamento_dia, 
            'usuarios_online' => $usuarios_online]);
    }

    function dashboardMensal(){
    $agendamento_mes =  Agenda::selectRaw('month(data) as month, ROUND(COUNT(id), 2) as quantidade')->groupByRaw('month(data)')->get();

        $usuarios_online = User::all()->count();

        return view('dashboardMensal', ['agendamento_mes' => $agendamento_mes, 
            'usuarios_online' => $usuarios_online]);
    }
<<<<<<< HEAD
=======

>>>>>>> 00c7db2a34cefd5a462c3fb38cf21d6271d33c01
}
