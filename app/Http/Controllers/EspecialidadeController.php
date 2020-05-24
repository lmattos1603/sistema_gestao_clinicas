<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class EspecialidadeController extends Controller
{
     function telaCadastro(){
		return view("tela_cadastro_especialidade");
	}
	function incluir(Request $req){
		$nome = $req->input("nome");
		$telefone = $req->input("descricao");
		
		$especialidade = new Especialidades();
		$especialidade->nome = $nome;
		$especialidade->descricao = $descricao;
		

		if($especialidade->save()){
			$retorno =  TRUE;
		}else{
			throw new\Exception("Nao foi possivel incluir");
			die;
		}
		return redirect()->route('especialidade_listar', ["mensagem"=>$retorno]);
	}
	function alterar(Request $req, $id){
        $especialidade = Especialidades::find($id);

        $nome = $req->input("nome");
		$telefone = $req->input("telefone");
		
		$especialidade = new Especialidades();
		$especialidade->nome = $nome;
		$especialidade->descricao = $descricao;

        if ($especialidade->save()){
            $msg = "especialidade $nome alterado com sucesso.";
        } else {
            $msg = "especialidade não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }
    function telaAlteracao($id){
		$especialidade = especialidades::find($id);
		return view("tela_alteracao_especialidade", ["espec" => $especialidade]);
	}
	function listar(){
			$especialidade = especialidades::all();/*coletar todos os clientes*/
			return view("lista_especialidade", ["espec" => $especialidade]);
		
		//return view("tela_login");
	}
}
?>