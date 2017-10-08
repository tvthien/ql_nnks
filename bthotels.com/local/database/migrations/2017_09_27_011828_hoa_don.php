<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('id_hd');
            $table->integer('ma_ptg_hd')->unsigned();
            $table->integer('ma_nv_hd')->unsigned();
            $table->integer('ma_pdp_hd')->unsigned();
            $table->dateTime('ngay_gio_lap');
            $table->integer('thue_vat');
            $table->double('tri_gia');
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
        Schema::dropIfExists('hoa_don');
    }
}
