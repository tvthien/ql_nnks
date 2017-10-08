<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhieuThueGio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_thue_gio', function (Blueprint $table) {
            $table->increments('id_ptg');
            $table->integer('ma_nnks_ptg')->unsigned();
            $table->integer('ma_kv_ptg')->unsigned();
            $table->integer('ma_tang_ptg')->unsigned();
            $table->integer('ma_phong_ptg')->unsigned();
            $table->integer('ma_nv_ptg')->unsigned();
            $table->dateTime('ngay_gio_lap');
            $table->string('cmnd');
            $table->string('ho_ten');
            $table->dateTime('gio_bd');
            $table->dateTime('gio_kt');
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
        Schema::dropIfExists('phieu_thue_gio');
    }
}
