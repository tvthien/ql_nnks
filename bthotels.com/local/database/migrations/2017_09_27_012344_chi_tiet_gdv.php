<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChiTietGdv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_gdv', function (Blueprint $table) {
            $table->integer('ma_gdv')->unsigned();
            $table->string('ma_tk',10);
            $table->date('ngay_kich_hoat');
            $table->date('ngay_het_han');
            $table->foreign('ma_tk')->references('id_user')->on('users');
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
        Schema::dropIfExists('chi_tiet_gdv');
    }
}
