<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function telaCadastro(){
		return view("tela_cadastro_usuario");
	}
}
