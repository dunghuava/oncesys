<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BenhNhan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_benhnhan', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('ma_bn')->nullable();
            $table->string('ho_ten')->nullable();
            $table->integer('gioi_tinh')->nullable();
            $table->string('ngay_sinh')->nullable();
            $table->string('tuoi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('province_id')->default(0);
            $table->string('district_id')->default(0);
            $table->string('ward_id')->default(0);
            $table->longText('ghi_chu')->nullable();
            $table->string('zalo')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('trang_thai')->default(0);
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
        Schema::dropIfExists('db_benhnhan');
    }
}
