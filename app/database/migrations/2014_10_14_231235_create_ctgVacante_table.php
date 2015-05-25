<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtgVacanteTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctgVacante', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('empresa_id')->unsigned();
            $table->string('nombre');
            $table->text('requisitos');
            $table->text('descripcion');

            $table->foreign('empresa_id')->references('id')->on('tblEmpresa')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ctgVacante');
    }

}
