<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_convenio extends Model
{
    protected $table = "clientes_convenios";
    protected $primaryKey = "id";   

    function convenio(){
    	return $this->belongsToMany('App\Convenio', 'id_convenio', 'id');
    }
    function cliente(){
    	return $this->belongsToMany('App\Cliente', 'id_cliente', 'id');
    }
}
