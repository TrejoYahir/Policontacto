<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblEventoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEvento', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('usuario_id')->unsigned();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->dateTime('fecha');
            $table->text('descripcion');
            $table->string('slug');

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
		Schema::drop('tblEvento');
	}

}
