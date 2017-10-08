<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiaPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_phong', function (Blueprint $table) {
            $table->integer('ma_lp')->unsigned();
            $table->integer('ma_kp')->unsigned();
            $table->date('ngay_gp');
            $table->double('gia_ngay');
            $table->double('gia_gio_bd');
            $table->double('gia_gio_tt');
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
        Schema::dropIfExists('gia_phong');
    }
}
