<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional;
use App\Especialidade;

class ProfissionalController extends Controller
{
    function telaListar(){
    	$profissional = Profissional::all();

    	return view("tela_listar_profissional", [ "profissionais" => $profissional ]);
    }

    function telaCadastro(){
    	return view("tela_cadastro_profissional");
    }

    function profissionalAdd(Request $req){
    	$nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $rg = $req->input('rg');
        $nascimento = $req->input('nascimento');

        $profissional = new Profissional();
        $profissional->nome = $nome;
        $profissional->cpf = $cpf;
        $profissional->rg = $rg;
        $profissional->nascimento = $nascimento;

        if($profissional->save()){
            $msg = "profissional $nome adicionado com sucesso!";
            $_SESSION['adicionado'] = "Adicionado!";
            return redirect()->route('cadastro_especialidade', [ "id" => $profissional->id ]);
        }else{
            $msg = "profissional não foi adicionado!";
            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }

    function telaAdicionarEspecialidade($id){
        $profissionais = Profissional::find($id);
        $especialidades = Especialidade::all();
    
        return view("tela_especialidade_profissional", [ "profissionais" => $profissionais, "especialidades" => $especialidades ]);
    }

    function adicionarEspecialidade(Request $req, $id){
        $id_especialidade = $req->input('id_especialidade');

        $especialidade = Especialidade::find($id_especialidade);
        $profissional = Profissional::find($id);

        $profissional->especialidades()->attach($id_especialidade);
        $profissional->save();

        return redirect()->route('cadastro_especialidade', [ "id" => $profissional->id ]);
    }

    function telaAlteracao($id){
        $profissional = Profissional::find($id);
        
        return view("tela_alteracao_profissional", [ "prof" => $profissional ]);
    }
    
    function alterar(Request $req, $id){
        $profissional = Profissional::find($id);
        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $rg = $req->input('rg');
        $nascimento = $req->input('nascimento');

        $profissional->nome = $nome;
        $profissional->cpf = $cpf;
        $profissional->rg = $rg;
        $profissional->nascimento = $nascimento;

        if($profissional->save()){
            $msg = "Profissional $nome adicionado com sucesso!";
             return redirect()->route('listar_profissional');
        }else{
            $msg = "Profissional não foi adicionado!";
            return view("listar_profissional", ["mensagem" => $msg]);
        }
    }

    function delete($id){
        $profissional = Profissional::find($id);

        if($profissional->delete()){
            $msg = "Profissional excluído com sucesso!";
            return redirect()->route('listar_profissional');
        }else{
            $msg = "Profissional não foi excluído!";
        }
    }
}
