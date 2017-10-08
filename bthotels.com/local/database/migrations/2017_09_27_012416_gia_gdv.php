<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiaGdv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_gdv', function (Blueprint $table) {
            $table->integer('ma_gdv')->unsigned();
            $table->double('gia_gdv');
            $table->date('ngay_gdv');
            $table->foreign('ngay_gdv')->references('n_gay')->on('ngay');
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
        Schema::dropIfExists('gia_gdv');
    }
}
