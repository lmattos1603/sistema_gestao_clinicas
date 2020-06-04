<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Cliente;
use App\Profissional;
use App\User;

class AgendaController extends Controller
{
    function telaListar(){
    	$agenda = Agenda::all();

        return view("teste", [ 'agenda' => $agenda ]);    	
    }

    function telaListarCli(){
        $ag = Agenda::all();
        $cliente = Cliente::find(1);
        $agenda = array();
        $i=0;

        foreach ($ag as $age) {
            if ($age->id_cliente == $cliente->id) {
                $agenda[$i] = $age;
                $i++;
            }
        }
        return view("teste", [ 'agenda' => $agenda ]);      
    }

    function telaListarProf(){
        $ag = Agenda::all();
        $profissional = Profissional::find(1);
        $agenda = array();
        $i=0;

        foreach ($ag as $age) {
            if ($age->id_profissional == $profissional->id) {
                $agenda[$i] = $age;
                $i++;
            }
        }
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
        $agenda->data = $data;
        $agenda->hora = $hora;
        $agenda->id_cliente = $id_cliente;
        $agenda->id_profissional = $id_profissional;
        
        if($agenda->save()){

            $msg = "Agenda adicionada com sucesso!";
            $_SESSION['adicionado'] = "Adicionada!";
            return redirect()->route('listar_agenda');
        
        }else{
            $msg = "Cliente não foi adicionado!";
        }
    }
}
