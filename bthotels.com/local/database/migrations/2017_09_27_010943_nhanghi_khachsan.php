<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanghiKhachsan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nn_ks', function (Blueprint $table) {
            $table->increments('id_nnks');
            $table->integer('ma_lnnks')->unsigned();
            $table->integer('hang_nnks')->unsigned();
            $table->integer('ma_px')->unsigned();
            $table->string('ten_nnks');
            $table->string('sdt')->unique();
            $table->string('dia_chi')->unique();
            $table->string('giay_pkd')->unique();
            $table->string('hinh_anh_nnks');
            $table->string('email')->unique();
            $table->string('facebook')->unique()->nullable();
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
        Schema::dropIfExists('nn_ks');
    }
}


