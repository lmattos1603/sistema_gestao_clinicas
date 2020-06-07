<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = 'convenios';
    protected $primaryKey = 'id';

    function clientes(){
        return $this->belongsToMany('App\Clientes', 'convenios_clientes', 'id_convenio', 'id_cliente')->withPivot(['id'])->withTimestamps();
    }
}
