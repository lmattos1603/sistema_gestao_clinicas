<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissional extends Model
{
	use SoftDeletes;

    protected $table = 'profissionais';
    protected $primaryKey = 'id';

    function especialidades(){
        return $this->belongsToMany('App\Especialidade', 'especialidades_profissionais', 'id_profissional', 'id_especialidade')->withPivot(['id'])->withTimestamps();
    }

    function agenda(){
        return $this->hasMany('App\Agenda', 'id_agenda', 'id');
    }
}
