<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_Alumnos extends Model
{
    public function materias(){
        return $this->belongsToMany('App\Cat_Materias')->using('App\Cat_rel_Alumno_Materia');
    }
}
