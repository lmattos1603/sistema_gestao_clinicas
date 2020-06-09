<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Cliente;
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

    	return view("tela_listar", [ "cli" => $cliente]);
    }

    function telaListar(){
        $cliente = Cliente::all();

        return view("tela_lista_clientes", [ "clientes" => $cliente]);
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
        $cliente->email = $email;

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

    function telaAlteracao($id){
        $cliente = Cliente::find($id);
        $user = User::all();
        foreach ($user as $us) {
            if ($us->id_cliente == $id) {
                $u = $us;
            }
        }

        return view("tela_alteracao_cliente", ["c" => $cliente, "u" => $u]);
    }

    function alterar(Request $req, $id){
        $cliente = Cliente::find($id);
        $user = User::all();
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
        $cliente->email = $email;

        $cliente->save();

        foreach ($user as $u) {
            if ($u->id_cliente == $id) {
                $u->name = $nome;
                $u->email = $email;
                $u->save();                
            }
        }
        
        return redirect()->route('listar_cliente');
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
}
