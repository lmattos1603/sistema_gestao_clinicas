<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Agenda;
use App\Cliente;
use App\Profissional;
use App\Especialidade;
use App\User;
use App\Cacapay;
use Auth;

class AgendaController extends Controller
{
    function telaListar(){
    	$agenda = Agenda::all();

        return view("agenda", [ 'agenda' => $agenda ]);   	
    }

    function telaLista(){
        $agenda = Agenda::all();

        return view("tela_listar_agenda", [ 'agenda' => $agenda ]);      
    }

    function telaListarCli($id){
        $ag = Agenda::all();
        $cliente = Cliente::find($id);
        $agenda = array();
        $i=0;

        foreach ($ag as $age) {
            if ($age->id_cliente == $cliente->id) {
                $agenda[$i] = $age;
                $i++;
            }
        }
        session([
            'm' => 'Aqui listamos todas as suas consultas agendadas.'
        ]);
        return view("agenda", [ 'agenda' => $agenda ]);      
    }

    function telaListarProf($id){
        $ag = Agenda::all();
        $profissional = Profissional::find($id);
        $agenda = array();
        $i=0;

        foreach ($ag as $age) {
            if ($age->id_profissional == $profissional->id) {
                $agenda[$i] = $age;
                $i++;
            }
        }
        session([
            'msg' => 'ATENÇÃO! Informamos que todos os horários em VERMELHO na agenda deste profissional estão ocupados.'
        ]);
        return view("agenda", [ 'agenda' => $agenda ]);      
    }

    function telaCadastro(){
    	$cliente = Cliente::all();
    	$profissional = Profissional::all();

    	return view("tela_cadastro_agenda", [ 'clientes' => $cliente, 'profissionais' => $profissional ]);
    }

    function telaAgendaAdd(Request $req){
        $id_cliente = $req->input('id_cliente');
        $id_profissional = $req->input('id_profissional');
        $data = $req->input('data');
        $hora = $req->input('hora');
        $profissional = Profissional::find($id_profissional);
        $cliente = Cliente::find($id_cliente);

        return view('tela_agenda_add', [ 'cliente' => $cliente, 'profissional' => $profissional, 'data' => $data, 'hora'=> $hora ]);
        
    }

    function agendaAdd(Request $req){
        $id_cliente = $req->input('id_cliente');
        $id_profissional = $req->input('id_profissional');
        $data = $req->input('data');
        $hora = $req->input('hora');
        $valor = $req->input('valor');
        $cliente = Cliente::find($id_cliente);

        $agenda = new Agenda();
        $agenda->data = $data;
        $agenda->hora = $hora;
        $agenda->id_cliente = $id_cliente;
        $agenda->id_profissional = $id_profissional;
        $agenda->valor_consulta = $valor;

        $cacapay = Cacapay::find(1);

        $reqCacapay = Http::post($cacapay->link, [
                "token" => $cacapay->token,
                "cpf" => $cliente->cpf,
                "valor" => $valor
            ]);

        if($reqCacapay->status() == 201){
            if($agenda->save()){

            $msg = "Agenda adicionada com sucesso!";
            return redirect()->route('listar_agenda');
        
            }else{
                $msg = "Agenda não foi adicionada!";
            }
        }elseif($reqCacapay->status() == 401){
            echo "Pagamento Negado!";
        }elseif($reqCacapay->status() == 402 || $reqCacapay->status() == 403 || $reqCacapay->status() == 404){
            echo "Erro ao solicitar pagamento, tente novamente!";
        }     
    }

    function telaAlterar($id){
        $agenda = Agenda::find($id);
        $cliente = $agenda->clientes;
        $profissional = $agenda->profissionais;

        return view("tela_alterar_agenda", [ 'agenda' => $agenda, 'c' => $cliente, 'p' => $profissional ]);      
    }

    function alterar(Request $req, $id){
        $id_cliente = $req->input('id_cliente');
        $id_profissional = $req->input('id_profissional');
        $data = $req->input('data');
        $hora = $req->input('hora');

        $agenda = Agenda::find($id);
        $agenda->data = $data;
        $agenda->hora = $hora;
        $agenda->id_cliente = $id_cliente;
        $agenda->id_profissional = $id_profissional;
        
        if($agenda->save()){

            $msg = "Agenda alterada com sucesso!";
            return redirect()->route('lista_agenda');
        
        }else{
            $msg = "Agenda não foi alterada!";
        }
    }

    function delete($id){
        $agenda = Agenda::find($id);

        if($agenda->delete()){
            $msg = "Agenda excluída com sucesso!";
            return redirect()->route('lista_agenda');
        }else{
            $msg = "Agenda não foi excluído!";
        }
    }

    function telaCadastroEsp($id){
        $profissional = Profissional::find($id);
        $cliente = Cliente::find(Auth::user()->id_cliente);

        return view("tela_cadastro_consulta", [ 'clientes' => $cliente, 'profissionais' => $profissional ]);
    }
}
