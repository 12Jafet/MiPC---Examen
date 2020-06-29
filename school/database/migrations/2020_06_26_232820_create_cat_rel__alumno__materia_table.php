<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatRelAlumnoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_rel__alumno__materia', function (Blueprint $table) {
            $table->integer('iCodigoAlumno');
            $table->integer('vchCodigoMateria');
            $table->float('fCalificacion',5,2)->nullable();
            $table->timestamps();

            $table->foreign('iCodigoAlumno')->references('iCodigoAlumno')->on('cat_alumnos');
            $table->foreign('vchCodigoMateria')->references('vchCodigoMateria')->on('cat_materias');
            // $table->primary(['iCodigoAlumno','vchCodigoMateria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_rel__alumno__materias');
    }
}
