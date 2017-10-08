<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NguoiDiCung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('nguoi_di_cung', function (Blueprint $table) {
            $table->increments('id_ndc');
            $table->integer('ma_ptg_ndc')->unsigned();
            $table->string('cmnd');
            $table->string('ho_ten');
            $table->string('sdt');
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
        Schema::dropIfExists('nguoi_di_cung');
    }
}
