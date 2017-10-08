<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuDungDv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_dung_dv', function (Blueprint $table) {
            $table->integer('ma_dv_sddv')->unsigned();
            $table->integer('ma_ptg_sddv')->unsigned();
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
        Schema::dropIfExists('su_dung_dv');
    }
}
