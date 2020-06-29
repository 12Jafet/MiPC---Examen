@extends('layouts.plantilla')

@section('seccion')
<br><br><br><br>
<div class='row m-0 justify-content-center'>
    <h1 style="color: #888;">Materias de {{$alumno->vchNombres}} {{$alumno->vchApellidos}}</h1>
</div>
<br>
@if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
@endif
<!-- Información alumno -->
<div class="card mb-4 box-shadow container p-3">
    <h4>información personal:</h4>
    <br>
    <p >Código de alumno: {{$alumno->iCodigoAlumno}}</p>
    <p>Nombres del alumno: {{$alumno->vchNombres}}</p>
    <p>Apellidos del alumno: {{$alumno->vchApellidos}}</p>
    <p>Fecha de nacimiento: {{$alumno->dtFechaNac}}</p>
</div>
<!-- Tabla -->
<table class="table table-striped table-dark" id="tabla" >
    <thead>
        <tr>
            <th scope='col'>Código</th>
            <th scope='col'>Materia</th>
            <th scope='col'>Califiación</th>
            <th scope='col'>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $materia)
    <tr>
        <td class="">{{$materia->vchCodigoMateria}}</td>
        <td class="">{{$materia->vchMateria}}</td>
        <td class="">{{$materia->fCalificacion}}</td>
        <td>
            <form action="{{route('alumno-del-materia', ['idAlumno'=>$alumno->iCodigoAlumno, 'idMateria'=>$materia->vchCodigoMateria])}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-secondary" id="">Eliminar</button>
            </form>
                <a data-id="{{$materia->vchCodigoMateria}}" class="open-modal btn btn-secondary" id="" data-toggle="modal" data-target="#modalAddCal">Agregar calificación</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>			
@endsection

@section('modal')
<form action="{{route('materia-cal')}}" method="POST"> 
    @csrf
    <!-- Modal Add Calificación -->
    <div class="modal fade" id="modalAddCal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar calificación a {{$alumno->vchNombres}} {{$alumno->vchApellidos}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="" for="">Favor de introducir calificación maximo 3 enteros y 2 decimales</label>
                    <input class="" name="fCalificacion" id="fCalificacion" placeholder="calificación" />
                    <input type="hidden" name="idModal" id="idModal"/>
                    <input type="hidden" name="iCodigoAlumno" id="iCodigoAlumno" value="{{$alumno->iCodigoAlumno}}"/>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-dark">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</form>

@endsection
