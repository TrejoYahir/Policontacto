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
            $table->string('tipo');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->boolean('admin')->default(false);
            $table->rememberToken();

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
