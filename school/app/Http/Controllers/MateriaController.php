<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriaController extends Controller {

//Mostrar todas las materias
    public function show(){   
        $materias = \DB::table('cat_materias')->select('vchCodigoMateria','vchMateria')->get();
        $alumnos = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->get(); 
        return view('materia',compact('materias','alumnos'));
    }

//Buscar materias por codigo de materia
    public function search(Request $request){   
        $materias = \DB::table('cat_materias')
            ->select('vchCodigoMateria','vchMateria')
            ->where('vchCodigoMateria',$request->vchCodigoMateria)->get();
        $alumnos = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->get();

        return view('materia',compact('materias','alumnos'));
    }

//Agregar calificación a alumno en cierta materia
    public function addCalificacion(Request $request){   
        $alumno_materia = \DB::table('cat_rel__alumno__materia')
            ->select()
            ->where('iCodigoAlumno', $request->iCodigoAlumno)
            ->where('vchCodigoMateria', $request->idModal);
        $alumno_materia->update(['fCalificacion' => $request->fCalificacion]); 
        return back()->with('mensaje','Calificación guardada');
    }
}
