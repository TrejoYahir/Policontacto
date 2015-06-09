<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblMensajeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMensaje', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned();
            $table->text('remitente');
            $table->text('destinatario');
            $table->text('contenido');
            $table->dateTime('fecha');
            $table->boolean('leido')->default(false);

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
        Schema::drop('tblMensaje');
    }

}
