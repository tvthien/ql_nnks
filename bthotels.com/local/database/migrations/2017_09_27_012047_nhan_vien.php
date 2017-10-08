<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->increments('id_nv');
            $table->integer('ma_nnks_nv')->unsigned();
            $table->integer('ma_cv_nv')->unsigned();
            $table->string('ten_nv');
            $table->string('cmnd');
            $table->date('ngay_sinh');
            $table->boolean('gioi_tinh');
            $table->string('dia_chi');
            $table->rememberToken();
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
        Schema::dropIfExists('nhan_vien');
    }
}
