<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BangThuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_bangthuoc', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->integer('id_khambenh')->nullable();
            $table->integer('id_thuoc')->nullable();
            $table->string('ten')->nullable();
            $table->integer('so_luong')->nullable();
            $table->integer('gia')->nullable();
            $table->text('lieu_dung')->nullable();
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
        Schema::dropIfExists('db_bangthuoc');
    }
}
