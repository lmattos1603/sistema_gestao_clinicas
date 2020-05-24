<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    function telaCadastro(){
		return view("tela_cadastro_profissional");
	}
	function incluir(Request $req){
		$nome = $req->input("nome");
		$rg = $req->input("rg");
		$cpf = $req->input("cpf");
		$data_nascimento = $req->input("data_nascimento");
		$id_especialidade = $req->input("id_especialidade");
		
		$profissional = new Profissionais();
		$profissional->nome = $nome;
		$profissional->rg = $rg;
		$profissional->cpf = $cpf;
		$profissional->data_nascimento = $data_nascimento;
		$profissional->id_especialidade = $id_especialidade;

		if($profissionais->save()){
			$retorno =  TRUE;
		}else{
			throw new\Exception("Nao foi possivel incluir");
			die;
		}
		return redirect()->route('lista_profissional', ["mensagem"=>$retorno]);
	}
	function alterar(Request $req, $id){
        $profissional = Profissionais::find($id);
		
		$nome = $req->input("nome");
		$rg = $req->input("rg");
		$cpf = $req->input("cpf");
		$data_nascimento = $req->input("data_nascimento");
		$id_especialidade = $req->input("id_especialidade");
		
		$profissional = new Profissionais();
		$profissional->nome = $nome;
		$profissional->rg = $rg;
		$profissional->cpf = $cpf;
		$profissional->data_nascimento = $data_nascimento;
		$profissional->id_especialidade = $id_especialidade;

		if($profissionais->save()){
			$retorno =  TRUE;
		}else{
			throw new\Exception("Nao foi possivel alterar");
			die;
		}
		return redirect()->route('lista_profissional', ["mensagem"=>$retorno]);
    }
	    function telaAlteracao($id){
		$profissional = Profissionais::find($id);
		return view("tela_alteracao_profissional", ["prof" => $profissional]);
	}
}
