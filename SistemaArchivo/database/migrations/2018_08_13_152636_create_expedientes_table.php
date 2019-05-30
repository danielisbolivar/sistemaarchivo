<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
            $table->enum('status', ['Disponible', 'Retirado', 'Perdido','Prestado']);
            $table->integer('estudiante_id')->unsigned()->unique();
            $table->integer('archivo_id')->unsigned();
            $table->integer('gaveta_id')->unsigned();
            $table->timestamps();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onUpdate('cascade')
                         ->onDelete('cascade');
            $table->foreign('archivo_id')->references('id')->on('archivos')->onUpdate('cascade')
                         ->onDelete('cascade');
            $table->foreign('gaveta_id')->references('id')->on('gavetas')->onUpdate('cascade')
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
        Schema::dropIfExists('expedientes');
    }
}
