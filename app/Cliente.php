<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    function convenios(){
        return $this->belongsToMany('App\Convenio', 'convenios_clientes', 'id_cliente', 'id_convenio')->withPivot(['id'])->withTimestamps();
    }

    function agenda(){
        return $this->hasMany('App\Agenda', 'id_agenda', 'id');
    }
}
