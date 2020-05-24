<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClienteController extends Controller
{
	function telaCadastro(){
		return view("tela_cadastro_cliente");
	}
    function incluir(Request $req){
		$nome = $req->input("nome");
		$rg = $req->input("rg");
		$cpf = $req->input("cpf");
		$data_nascimento = $req->input("data_nascimento");
		$email = $req->input("email");
		$telefone = $req->input("telefone");
		$senha = $req->input("senha");

		$req->validate([
            'nome' => 'required|min:10',
            'email' => 'required|alpha|min:8',
            'senha' => 'required|min:6|different:nome|confirmed'
        ]);
		
		$cliente = new Clientes();
		$cliente->nome = $nome;
		$cliente->rg = $rg;
		$cliente->cpf = $cpf;
		$cliente->data_nascimento = $data_nascimento;
		$cliente->email = $email;
		$cliente->telefone = $telefone;
		$cliente->senha = $senha;

		if($cliente->save()){
			$retorno =  TRUE;
		}else{
			throw new\Exception("Nao foi possivel incluir");
			die;
		}
		return redirect()->route('cliente_listar', ["mensagem"=>$retorno]);
	}
	function alterar(Request $req, $id){
        $cliente = cliente::find($id);
		
		$nome = $req->input("nome");
		$rg = $req->input("rg");
		$cpf = $req->input("cpf");
		$data_nascimento = $req->input("data_nascimento");
		$email = $req->input("email");
		$telefone = $req->input("telefone");
		$senha = $req->input("senha");

		$cliente = new Clientes();
		$cliente->nome = $nome;
		$cliente->rg = $rg;
		$cliente->cpf = $cpf;
		$cliente->data_nascimento = $data_nascimento;
		$cliente->email = $email;
		$cliente->telefone = $telefone;
		$cliente->senha = $senha;

        if ($cliente->save()){
            $msg = "Usuário $nome alterado com sucesso.";
        } else {
            $msg = "Usuário não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }
    function telaAlteracao($id){
		$clientes = Clientes::find($id);
		return view("tela_alteracao_cliente", ["c" => $clientes]);
	}
    function excluir($id){
        $cliente = Clientes::find($id);

        /*
        	Fazer o que necessita para a exclusao
        */
        if ($cliente->delete()){
            $msg = "Usuário $id excluído com sucesso.";
        } else {
            $msg = "Usuário não foi excluído.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }*/
    	function listar(){
		
			$clientes = Clientes::all();/*coletar todos os clientes*/
			return view("lista_cliente", ["cli" => $clientes]);
		
		//return view("tela_login");
	}
}
