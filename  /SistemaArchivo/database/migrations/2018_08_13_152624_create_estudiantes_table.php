<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
             $table->increments('id');
            $table->char('nacionalidad');
            $table->string('ci',10)->unique();
            $table->string('nombre',70);
            $table->string('apellido',70);
            $table->enum('sexo', ['femenino', 'masculino']);
            $table->string('telefono',15);
            $table->text('direccion');
            $table->string('correo',128)->unique();
            $table->integer('carrera_id')->unsigned();
            $table->timestamps();
            //relaciones
           
            $table->foreign('carrera_id')->references('id')->on('carreras')->onUpdate('cascade')
                         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
