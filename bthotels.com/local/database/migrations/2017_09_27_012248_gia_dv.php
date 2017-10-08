<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiaDv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_dv', function (Blueprint $table) {
            $table->integer('ma_dv')->unsigned();
            $table->double('gia_dv');
            $table->date('ngay_dv');
            $table->foreign('ngay_dv')->references('n_gay')->on('ngay');
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
        Schema::dropIfExists('gia_dv');
    }
}
