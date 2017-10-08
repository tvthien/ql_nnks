<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_phong', function (Blueprint $table) {
            $table->integer('ma_kv_dp')->unsigned();
            $table->integer('ma_tang_dp')->unsigned();
            $table->integer('ma_phong_dp')->unsigned();
            $table->integer('ma_pdp_dp')->unsigned();
            $table->date('ngay_den');
            $table->date('ngay_di');
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
        Schema::dropIfExists('dat_phong');
    }
}
