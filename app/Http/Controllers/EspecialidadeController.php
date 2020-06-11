<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Especialidade;
use App\Profissional;

class especialidadeController extends Controller
{
    function telaListar(){
    	$especialidade = Especialidade::all();

    	return view("tela_listar_especialidade", [ "especialidades" => $especialidade ]);
    }
    function telaListarEspecialidadeMenu(){
        $especialidade = Especialidade::all();

        return view("tela_lista_especialidade_foto", [ "especialidades" => $especialidade ]);
    }
        function telaAlteracao($id){
        $especialidade = Especialidade::find($id);
        
        return view("tela_alteracao_especialidade", [ "espec" => $especialidade ]);
    }

    function telaCadastro(){
    	return view("tela_cadastro_especialidade");
    }

    function especialidadeAdd(Request $req){
    	$nome = $req->input('nome');
        $descricao = $req->input('descricao');
        $imagem = $req->file('upload');

        $especialidade = new Especialidade();
        $especialidade->nome = $nome;
        $especialidade->descricao = $descricao;
        $especialidade->imagem = $nome;
        $especialidade->save();

        $nome_arquivo = $especialidade->nome . " " . $especialidade->id;
        $nome_arquivo = Str::of($nome_arquivo)->slug('-');
        $nome_arquivo = $nome_arquivo . "." . $imagem->extension();

        $nome_arquivo = $imagem->storeAs('imagens_especialidades', $nome_arquivo);

        $especialidade->imagem = "upload/$nome_arquivo";     

        if($especialidade->save()){


            $msg = "especialidade $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return view("tela_cadastro_especialidade", ["mensagem" => $msg]);
        }else{
            $msg = "especialidade não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }
    function alterar(Request $req, $id){
         $especialidade = Especialidade::find($id);
        $nome = $req->input('nome');
        $descricao = $req->input('descricao');

        
        $especialidade->nome = $nome;
        $especialidade->descricao = $descricao;

        if($especialidade->save()){
            $msg = "especialidade $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
           return redirect()->route('listar_especialidade');
        }else{
            $msg = "especialidade não foi adicionado!";
           return redirect()->route('listar_especialidade');
        }
    }
    function delete($id){
        $especialidade = Especialidade::find($id);

        if($especialidade->delete()){
            $msg = "Especialidade excluída com sucesso!";
            return redirect()->route('listar_especialidade');
        }else{
            $msg = "Especialidade não foi excluído!";
        }
    }
    function especialidade_prof($id){
        /* $id = id do usuario */
        $especialidade = Especialidade::find($id);
      //  dd($especialidade);
        
        return view('tela_lista_especialista', ["especialidade" => $especialidade]);
    }
}
