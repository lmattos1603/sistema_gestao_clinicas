<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Cliente;
use App\Profissional;

class AgendaController extends Controller
{
    function telaListar(){
    	$agenda = Agenda::all();

    	return view("teste", [ 'agenda' => $agenda ]);
    }

    function telaCadastro(){
    	$cliente = Cliente::all();
    	$profissional = Profissional::all();

    	return view("tela_cadastro_agenda", [ 'clientes' => $cliente, 'profissionais' => $profissional ]);
    }

    function agendaAdd(Request $req){
    	$id_cliente = $req->input('id_cliente');
        $id_profissional = $req->input('id_profissional');
        $data = $req->input('data');
        $hora = $req->input('hora');

        $agenda = new Agenda();
        $agenda->id_cliente = $id_cliente;
        $agenda->id_profissional = $id_profissional;
        $agenda->data = $data;
        $agenda->hora = $hora;

        if(strtotime($data) > strtotime(date('d-m-Y'))){
            if($agenda->save()){
                $msg = "Agenda adicionada com sucesso!";
                $_SESSION['adicionado'] = "Adicionada!";
                return redirect()->route('agenda_cadastro');
            }else{
                $msg = "Cliente não foi adicionado!";
            }
        }else{
            $cliente = Cliente::all();
            $profissional = Profissional::all();
            $mensagem = "Por favor, Insira uma data a partir da data atual!";

            return view("tela_cadastro_agenda", [ 'clientes' => $cliente, 'profissionais' => $profissional, 'mensagem' => $mensagem]);
        }
    }
}
