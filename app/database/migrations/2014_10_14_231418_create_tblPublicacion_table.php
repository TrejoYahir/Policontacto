<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblPublicacionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPublicacion', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned();
            $table->string('contenido');
            $table->string('url_archivo')->nullable();
            $table->dateTime('fecha_p');
            $table->enum('tipo', ['texto', 'archivo', 'video', 'código', 'imágen', 'audio']);

            $table->foreign('usuario_id')->references('id')->on('tblUsuario')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('tblPublicacion');
    }

}
