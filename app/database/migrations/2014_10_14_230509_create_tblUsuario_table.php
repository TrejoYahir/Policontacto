<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblUsuarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUsuario', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email');
            $table->string('password');
            $table->string('url_foto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('remember_token')->nullable();
	        $table->boolean('admin')->default(false);

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
        Schema::drop('tblUsuario');
    }

}
