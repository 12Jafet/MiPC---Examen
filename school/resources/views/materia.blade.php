@extends('layouts.plantilla')

@section('seccion')
<br><br><br><br>
<div class='row m-0 justify-content-center'>
    <h1 style="color: #888;">Materias</h1>
</div>
<br>
<!-- Buscar materia -->
<form action="{{route('materia-search')}}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <input class="col-8 form-control" type="text" id="vchCodigoMateria" name="vchCodigoMateria"  placeholder="Ingrese código de la materia">
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
            <th scope='col'>Materia</th>
            <th scope='col'>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($materias as $materia)
    <tr>
        <td class="">{{$materia->vchCodigoMateria}}</td>
        <td class="">{{$materia->vchMateria}}</td>
        <td>
            <button data-id="{{$materia->vchCodigoMateria}}" class="open-modal btn btn-secondary" data-toggle="modal" data-target="#modalAddAlumno">Agregar Alumno</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>			
@endsection

@section('modal')
<form action="{{route('alumno-materia2')}}" method="POST"> 
    @csrf
    <!-- Modal Add Alumno -->
    <div class="modal fade" id="modalAddAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-3" for="">Alumno</label>
                    <select class="col-7" type="text" name="iCodigoAlumno" id="iCodigoAlumno">
                        @foreach($alumnos as $alumno)
                            <option value="{{$alumno->iCodigoAlumno}}">{{$alumno->iCodigoAlumno}} - {{$alumno->vchNombres}} {{$alumno->vchApellidos}}</option>
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
