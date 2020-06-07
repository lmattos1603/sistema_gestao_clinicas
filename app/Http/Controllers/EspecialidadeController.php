<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class especialidadeController extends Controller
{
    function telaListar(){
    	$especialidade = Especialidade::all();

    	return view("tela_listar_especialidade", [ "especialidades" => $especialidade ]);
    }

    function telaCadastro(){
    	return view("tela_cadastro_especialidade");
    }

    function especialidadeAdd(Request $req){
    	$nome = $req->input('nome');
        $descricao = $req->input('descricao');

        $especialidade = new Especialidade();
        $especialidade->nome = $nome;
        $especialidade->descricao = $descricao;

        if($especialidade->save()){
            $msg = "especialidade $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return view("tela_cadastro_especialidade", ["mensagem" => $msg]);
        }else{
            $msg = "especialidade não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }
}
