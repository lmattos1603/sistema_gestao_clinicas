<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convenio;

class ConvenioController extends Controller
{
    function telaListar(){
    	$convenio = Convenio::all();

    	return view("tela_listar_convenio", [ "convenios" => $convenio ]);
    }
        
    function telaAlteracao($id){
        $convenio = Convenio::find($id);
        
        return view("tela_alteracao_convenio", [ "c" => $convenio ]);
    }

    function telaCadastro(){
    	return view("tela_cadastro_convenio");
    }

    function convenioAdd(Request $req){
    	$nome = $req->input('nome');
        $telefone = $req->input('telefone');

        $convenio = new Convenio();
        $convenio->nome = $nome;
        $convenio->telefone = $telefone;

        if($convenio->save()){
            $msg = "convenio $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return view("tela_cadastro_convenio", ["mensagem" => $msg]);
        }else{
            $msg = "convenio não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }
    function alterar(Request $req, $id){
        $convenio = Convenio::find($id);
        $nome = $req->input('nome');
        $telefone = $req->input('telefone');

        
        $convenio->nome = $nome;
        $convenio->telefone = $telefone;

        if($convenio->save()){
            $msg = "convenio $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return view("tela_listar_convenio", ["mensagem" => $msg]);
        }else{
            $msg = "convenio não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }
    function delete($id){
        $convenio = Convenio::find($id);

        if($convenio->delete()){
            $msg = "Convenio excluída com sucesso!";
            return redirect()->route('listar_convenio');
        }else{
            $msg = "Convenio não foi excluído!";
        }
    }
}
