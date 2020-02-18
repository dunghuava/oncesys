<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_kinh', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('ma')->nullable();
            $table->string('ten')->nullable();
            $table->integer('id_loai')->default(0);
            $table->integer('gia_ban')->default(0);
            $table->integer('gia_von')->default(0);
            $table->integer('so_luong')->default(0);
            $table->string('ngay_sx')->nullable();
            $table->string('han_sd')->nullable();
            $table->text('chi_tiet')->nullable();
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
        //
        Schema::dropIfExists('db_kinh');
    }
}
