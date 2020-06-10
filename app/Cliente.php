<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
	
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    function convenios(){
        return $this->belongsToMany('App\Convenio', 'convenios_clientes', 'id_cliente', 'id_convenio')->withPivot(['id'])->withTimestamps();
    }

    function agenda(){
        return $this->hasMany('App\Agenda', 'id_agenda', 'id');
    }
}
