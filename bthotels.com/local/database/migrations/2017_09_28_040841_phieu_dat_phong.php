<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhieuDatPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_dat_phong', function (Blueprint $table) {
            $table->increments('id_pdp');
            $table->integer('ma_nnks_pdp')->unsigned();
            $table->integer('ma_kdl_pdp')->unsigned();
            $table->integer('ma_nv_pdp')->unsigned();
            $table->date('ngay_dp');
            $table->double('tien_coc');
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
        Schema::dropIfExists('phieu_dat_phong');
    }
}
