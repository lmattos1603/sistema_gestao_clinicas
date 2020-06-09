<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convenio extends Model
{
	use SoftDeletes;
	
    protected $table = 'convenios';
    protected $primaryKey = 'id';

    function clientes(){
        return $this->belongsToMany('App\Clientes', 'convenios_clientes', 'id_convenio', 'id_cliente')->withPivot('id_cliente')->withTimestamps();
    }
}
