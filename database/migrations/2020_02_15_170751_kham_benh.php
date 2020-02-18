<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhamBenh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_khambenh', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->integer('id_benhnhan')->nullable();
            $table->string('lydo_kham')->nullable();
            $table->string('chi_dinh')->nullable();
            $table->string('thu_thuat')->nullable();
            $table->string('dan_do')->nullable();
            $table->integer('chi_phi')->nullable();
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
        Schema::dropIfExists('db_khambenh');
    }
}
