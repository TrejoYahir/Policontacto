<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblEmpresaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmpresa', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('area_id')->unsigned();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->string('descripcion');
            $table->string('url_foto')->nullable();
            $table->string('slug');

            $table->foreign('id')->references('id')->on('tblUsuario')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('tblEmpresa');
    }

}
