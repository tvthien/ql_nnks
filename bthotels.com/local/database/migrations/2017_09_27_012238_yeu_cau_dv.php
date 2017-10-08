<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YeuCauDv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeu_cau_dv', function (Blueprint $table) {
            $table->integer('ma_pdp_ycdv')->unsigned();
            $table->integer('ma_kv_ycdv')->unsigned();
            $table->integer('ma_tang_ycdv')->unsigned();
            $table->integer('ma_p_ycdv')->unsigned();
            $table->integer('ma_dv_ycdv')->unsigned();
            $table->dateTime('gio_yeu_cau');
            $table->integer('so_luong');
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
        Schema::dropIfExists('yeu_cau_dv');
    }
}
