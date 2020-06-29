<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('alumno',[
    'as'=> 'alumno-show',
    'uses'=>'AlumnoController@show'
]);

Route::get('alumno/{id}',[
    'as'=> 'alumno-kardex',
    'uses'=>'AlumnoController@kardex'
]);

Route::delete('alumno/{idAlumno}/{idMateria}',[
    'as'=> 'alumno-del-materia',
    'uses'=>'AlumnoController@delMateria'
]);

Route::post('alumno',[
    'as'=> 'alumno-search',
    'uses'=>'AlumnoController@search'
]);

Route::post('alumno/add',[
    'as'=> 'alumno-materia',
    'uses'=>'AlumnoController@addMateria'
]);

Route::post('materia/add',[
    'as'=> 'alumno-materia2',
    'uses'=>'AlumnoController@addMateria2'
]);

Route::get('materia',[
    'as'=> 'materia-show',
    'uses'=>'MateriaController@show'
]);

Route::post('materia',[
    'as'=> 'materia-search',
    'uses'=>'MateriaController@search'
]);

Route::post('materia/cal',[
    'as'=> 'materia-cal',
    'uses'=>'MateriaController@addCalificacion'
]);

