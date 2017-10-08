<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DanhGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->integer('ma_nnks_dg')->unsigned();
            $table->integer('tkk_email_dg')->unsigned();
            $table->date('ngay_dg');
            $table->integer('so_sao_dg')->nullable();
            $table->string('binh_luan');
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
        Schema::dropIfExists('danh_gia');
    }
}
