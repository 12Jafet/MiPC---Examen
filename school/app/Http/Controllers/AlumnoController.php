<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat_rel_Alumno_Materias as Alumno_Materia;

class AlumnoController extends Controller {
//Mostrar todos los alumnos
    public function show(){   
        $alumnos = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->get();
        $materias = \DB::table('cat_materias')->select('vchCodigoMateria','vchMateria')->get();
        return view('alumno',compact('alumnos','materias'));
    }

//Buscar alumno por codigo
    public function search(Request $request){   
        $alumnos = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->where('iCodigoAlumno',$request->iCodigoAlumno)->get();
        $materias = \DB::table('cat_materias')->select('vchCodigoMateria','vchMateria')->get();
        return view('alumno',compact('alumnos','materias'));
    }

// Mostrar la lista de materias de determinado alumno e info personal
    public function kardex($id){   
        $alumno = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->where('iCodigoAlumno',$id)->first();
        $data = \DB::table('cat_rel__alumno__materia')
            ->join('cat_alumnos','cat_rel__alumno__materia.iCodigoAlumno','=','cat_alumnos.iCodigoAlumno')
            ->join('cat_materias','cat_rel__alumno__materia.vchCodigoMateria','=','cat_materias.vchCodigoMateria')
            ->select('cat_materias.vchCodigoMateria','cat_materias.vchMateria','cat_alumnos.iCodigoAlumno','cat_alumnos.vchNombres','cat_alumnos.vchApellidos', 'cat_alumnos.dtFechaNac', 'cat_rel__alumno__materia.fCalificacion')
            ->where('cat_rel__alumno__materia.iCodigoAlumno',$id)->get();
        // return $data->all();
        return view('kardex',compact('data','alumno'));
    }

// Inscribir alumno a materia desde la vista alumnos
    public function addMateria(Request $request){   
        $alumno = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->where('iCodigoAlumno',$request->iCodigoAlumno)->first();
        $materia = \DB::table('cat_materias')->select('vchCodigoMateria','vchMateria')->where('vchCodigoMateria',$request->vchCodigoMateria)->first();
        $alumno_materia = \DB::table('cat_rel__alumno__materia')->select()
            ->where('iCodigoAlumno',$request->idModal)
            ->where('vchCodigoMateria',$request->vchCodigoMateria)
            ->first();
        if($alumno_materia === null){
            $alumno_materia = new Alumno_Materia();
            $alumno_materia->vchCodigoMateria = $request->vchCodigoMateria;
            $alumno_materia->iCodigoAlumno = $request->idModal;
            $alumno_materia->save();
            return back()->with('mensaje','Materia agregada');
        }
            return back()->with('mensaje','La materia ya se econtraba registrada');

    }

// Inscribir alumno a materia desde la vista materias
    public function addMateria2(Request $request){   
        $alumno = \DB::table('cat_alumnos')->select('iCodigoAlumno','vchNombres','vchApellidos', 'dtFechaNac')->where('iCodigoAlumno',$request->iCodigoAlumno)->first();
        $materia = \DB::table('cat_materias')->select('vchCodigoMateria','vchMateria')->where('vchCodigoMateria',$request->vchCodigoMateria)->first();
        $alumno_materia = \DB::table('cat_rel__alumno__materia')->select()
        ->where('iCodigoAlumno',$request->iCodigoAlumno)
        ->where('vchCodigoMateria',$request->idModal)
        ->first();
        if($alumno_materia === null){
            $alumno_materia = new Alumno_Materia();
            $alumno_materia->vchCodigoMateria = $request->idModal;
            $alumno_materia->iCodigoAlumno = $request->iCodigoAlumno;
            $alumno_materia->save();
            return back()->with('mensaje','Alumno agregado');
        }
            return back()->with('mensaje','El alumno ya estaba inscrito a esta materia');

    }
// Dar de baja una materia
    public function delMateria($idAlumno, $idMateria){   
        $alumno_materia = \DB::table('cat_rel__alumno__materia')->select()->where('vchCodigoMateria',$idMateria)->where('vchCodigoMateria',$idMateria);
        $alumno_materia->delete();
        return back()->with('mensaje','Materia eliminada');
    }
}
