<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
   	protected $table = "agendas";
   	protected $primaryKey = "id";

    function profissional(){
    	return $this->belongsToMany('App\Profissional', 'id_profissional', 'id');
    }
    function cliente(){
    	return $this->belongsToMany('App\Cliente', 'id_cliente', 'id');
    }
}
