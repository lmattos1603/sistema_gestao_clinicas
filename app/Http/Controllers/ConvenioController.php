<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convenios;

class ConvenioController extends Controller
{
    function telaCadastro(){
		return view("tela_cadastro_convenio");
	}
	function incluir(Request $req){
		$nome = $req->input("nome");
		$telefone = $req->input("telefone");
		
		$convenio = new Convenios();
		$convenio->nome = $nome;
		$convenio->telefone = $telefone;
		

		if($convenio->save()){
			$retorno =  TRUE;
		}else{
			throw new\Exception("Nao foi possivel incluir");
			die;
		}
		return redirect()->route('convenio_listar', ["mensagem"=>$retorno]);
	}
	function alterar(Request $req, $id){
        $convenio = Convenios::find($id);

        $nome = $req->input("nome");
		$telefone = $req->input("telefone");
		
		$convenio = new Convenios();
		$convenio->nome = $nome;
		$convenio->telefone = $telefone;

        if ($convenio->save()){
            $msg = "Convenio $nome alterado com sucesso.";
        } else {
            $msg = "Convenio não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }
    function telaAlteracao($id){
		$convenio = Convenios::find($id);
		return view("tela_alteracao_convenio", ["c" => $convenio]);
	}
	function listar(){
			$convenio = Convenios::all();/*coletar todos os clientes*/
			return view("lista_convenio", ["convenio" => $convenio]);
		
		//return view("tela_login");
	}
}
?>