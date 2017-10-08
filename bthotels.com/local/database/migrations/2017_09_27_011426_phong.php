<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Phong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->increments('id_p');            
            $table->integer('ma_kv_p')->unsigned();
            $table->integer('ma_tang_p')->unsigned();
            $table->integer('ma_nnks_p')->unsigned();
            $table->integer('ma_lp_p')->unsigned();
            $table->integer('ma_kp_p')->unsigned();
            $table->string('ten_p');
            $table->string('hinh_anh_p');
            $table->boolean('tinh_trang');
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
        Schema::dropIfExists('phong');
    }
}
