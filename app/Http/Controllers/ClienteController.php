<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Convenio;

class ClienteController extends Controller
{
    function telaLogin(){
    	return view("login");
    }

    function logar(Request $req){
        $cliente = Cliente::all();

        $email = $req->input('email');
        $senha = $req->input('senha');

        $cliente = Cliente::where('email', '=', $email)->first();

        if($cliente and $cliente->senha == $senha){
            $variavel = [ 
                "email" => $email,
                "nome" => $cliente->nome 
            ];
            session($variavel);

            return redirect()->route('listar');
        }else{
            return redirect()->route('login');
        }
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
        $email = $req->input('email');
        $senha = $req->input('senha');

        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->rg = $rg;
        $cliente->nascimento = $nascimento;
        $cliente->telefone = $telefone;
        $cliente->email = $email;
        $cliente->senha = $senha;

        if($cliente->save()){
            $msg = "Cliente $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return redirect()->route('cadastro_convenio', [ "id" => $cliente->id ]);
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
