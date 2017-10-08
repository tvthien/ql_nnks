<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrangBi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trang_bi', function (Blueprint $table) {

            $table->integer('ma_kv_trbi')->unsigned();
            $table->integer('ma_tang_trbi')->unsigned();
            $table->integer('ma_p_trbi')->unsigned();
            $table->integer('ma_thbi_trbi')->unsigned();
            $table->integer('so_luong');
            $table->double('don_gia');
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
        Schema::dropIfExists('trang_bi');
    }
}
