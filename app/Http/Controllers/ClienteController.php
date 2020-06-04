<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Convenio;
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

    function telaListar(){
    	$cliente = Cliente::all();

    	return view("tela_listar", [ "clientes" => $cliente ]);
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

        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->rg = $rg;
        $cliente->nascimento = $nascimento;
        $cliente->telefone = $telefone;

        if($cliente->save()){
            $msg = "Cliente $nome adicionado com sucesso!";
            return redirect()->route('listar_cliente');
        }else{
            $msg = "Cliente não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
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
}
