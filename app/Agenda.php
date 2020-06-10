<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
	use SoftDeletes;
	
    protected $table = 'agenda';
    protected $primaryKey = 'id';

    function clientes(){
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    function profissionais(){
        return $this->belongsTo('App\Profissional', 'id_profissional', 'id');
    }
}
