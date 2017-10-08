<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThietBi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thiet_bi', function (Blueprint $table) {
            $table->increments('id_tb');
            $table->integer('ma_ltb_tb')->unsigned();
            $table->integer('ma_nnks_tb')->unsigned();
            $table->string('ten_tb');
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
        Schema::dropIfExists('thiet_bi');
    }
}
