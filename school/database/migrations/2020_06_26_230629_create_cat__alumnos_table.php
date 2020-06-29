<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_alumnos', function (Blueprint $table) {
            $table->integer('iCodigoAlumno');
            $table->string('vchNombres');
            $table->string('vchApellidos');
            $table->date('dtFechaNac');
            $table->timestamps();

            $table->primary('iCodigoAlumno');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_alumnos');
    }
}
