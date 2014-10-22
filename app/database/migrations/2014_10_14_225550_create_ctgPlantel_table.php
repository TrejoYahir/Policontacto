<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtgPlantelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ctgPlantel', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('area_id')->unsigned();
            $table->string('nombre');
            $table->string('ubicacion');

            $table->foreign('area_id')->references('id')->on('ctgArea')->onUpdate('cascade');

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
		Schema::drop('ctgPlantel');
	}

}
