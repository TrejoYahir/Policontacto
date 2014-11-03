<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblEstudianteTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEstudiante', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('area_id')->unsigned();
            $table->integer('plantel_id')->unsigned();
            $table->integer('especialidad_id')->unsigned();
            $table->string('nombre');
            $table->string('apellidos');
	        $table->string('genero');
            $table->text('curriculum');
            $table->date('fecha');
            $table->string('slug')->nullable();
            $table->boolean('serv')->default(false);
            $table->boolean('empleo')->default(false);

            $table->foreign('id')->references('id')->on('tblUsuario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('plantel_id')->references('id')->on('ctgPlantel')->onUpdate('cascade');
            $table->foreign('especialidad_id')->references('id')->on('ctgEspecialidad')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('ctgArea')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblEstudiante');
    }

}
