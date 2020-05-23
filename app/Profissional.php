<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = "profissionais";
    protected $primaryKey = "id";

    function convenio(){
    	return $this->belongsToMany('App\Convenio', 'id_convenio', 'id');
    }
    function especialidade(){
    	return $this->belongsToMany('App\Especialidade', 'id_especialidade', 'id');
    }
}
