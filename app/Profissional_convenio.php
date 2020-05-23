<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional_convenio extends Model
{
    protected $table = "profissionais_convenios";
    protected $primaryKey = "id";
    
    function convenio(){
    	return $this->belongsToMany('App\Convenio', 'id_convenio', 'id');
    }
    function profissional(){
    	return $this->belongsToMany('App\Profissional', 'id_profissional', 'id');
    }
}
