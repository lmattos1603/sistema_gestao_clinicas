<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';

    function clientes(){
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    function profissionais(){
        return $this->belongsTo('App\Profissional', 'id_profissional', 'id');
    }
}
