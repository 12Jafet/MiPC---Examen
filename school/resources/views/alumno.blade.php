@extends('layouts.plantilla')

@section('seccion')
<br><br><br><br>
<div class='row m-0 justify-content-center'>
    <h1 style="color: #888;">Alumnos</h1>
</div>
<br>
<!-- Buscar alumno -->
<form action="{{route('alumno-search')}}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <input class="col-8 form-control" type="text" id="iCodigoAlumno" name="iCodigoAlumno" placeholder="Ingrese código del alumno" >
        <button class="col-2 btn btn-dark text-light">Buscar</button>       
    </div>
</form>
<br>
@if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
@endif
<!-- Tabla -->
<table class="table table-striped table-dark" id="tabla" >
    <thead>
        <tr>
            <th scope='col'>Código</th>
            <th scope='col'>Nombres</th>
            <th scope='col'>Apellidos</th>
            <th scope='col'>Fecha de nacimiento</th>
            <th scope='col'>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
    <tr>
        <td class="">{{$alumno->iCodigoAlumno}}</td>
        <td class="">{{$alumno->vchNombres}}</td>
        <td class="">{{$alumno->vchApellidos}}</td>
        <td class="">{{$alumno->dtFechaNac}}</td>
        <td>
            <button data-id="{{$alumno->iCodigoAlumno}}" class="open-modal btn btn-secondary" data-toggle="modal" data-target="#modalAddMateria">Agregar Materia</button>
            <a class="btn btn-secondary" href="{{route('alumno-kardex',$alumno->iCodigoAlumno)}}" class="" id="">Ver Materias</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>			
@endsection


@section('modal')
<form action="{{route('alumno-materia')}}" method="POST"> 
    @csrf
    <!-- Modal Add Materia -->
    <div class="modal fade" id="modalAddMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-3" for="">Materia</label>
                    <select class="col-7" type="text" name="vchCodigoMateria" id="vchCodigoMateria">
                        @foreach($materias as $materia)
                            <option value="{{$materia->vchCodigoMateria}}">{{$materia->vchCodigoMateria}} - {{$materia->vchMateria}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="idModal" id="idModal">
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
