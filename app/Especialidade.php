<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidade extends Model
{
	use SoftDeletes;
	
    protected $table = 'especialidades';
    protected $primaryKey = 'id';

    function profissionais(){
        return $this->belongsToMany('App\Profissionais', 'especialidades_profissionais', 'id_especialidade', 'id_profissional')->withPivot(['id'])->withTimestamps();
    }
}
