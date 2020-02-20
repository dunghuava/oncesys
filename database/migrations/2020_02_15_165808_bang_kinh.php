<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BangKinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_bangkinh', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->integer('id_khambenh')->nullable();
            $table->integer('id_kinh')->nullable();
            $table->string('ten')->nullable();
            $table->string('khongkinh_mp')->nullable();
            $table->string('khongkinh_mt')->nullable();
            $table->string('kinhlo_mp')->nullable();
            $table->string('kinhlo_mt')->nullable();
            $table->string('kinhcu_mp')->nullable();
            $table->string('kinhcu_mt')->nullable();
            $table->string('kinhmoi_mp')->nullable();
            $table->string('kinhmoi_mt')->nullable();
            $table->string('thiluc_cu_mp')->nullable();
            $table->string('thiluc_cu_mt')->nullable();
            $table->string('thiluc_moi_mp')->nullable();
            $table->string('thiluc_moi_mt')->nullable();
            $table->string('nhanap_mp')->nullable();
            $table->string('nhanap_mt')->nullable();
            $table->string('chandoan_mp')->nullable();
            $table->string('chandoan_mt')->nullable();
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
        Schema::dropIfExists('db_bangkinh');
    }
}
