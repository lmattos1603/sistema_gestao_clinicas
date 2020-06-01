<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissionais';
    protected $primaryKey = 'id';

    function especialidades(){
        return $this->belongsToMany('App\Especialidade', 'especialidades_profissionais', 'id_profissional', 'id_especialidade')->withPivot(['id'])->withTimestamps();
    }

    function agenda(){
        return $this->hasMany('App\Agenda', 'id_agenda', 'id');
    }
}
