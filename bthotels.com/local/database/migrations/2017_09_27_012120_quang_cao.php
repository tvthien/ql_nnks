<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuangCao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quang_cao', function (Blueprint $table) {
            $table->increments('id_qc');
            $table->integer('ma_nnks_qc')->unsigned();
            $table->string('tieu_de');
            $table->string('noi_dung');
            $table->string('hinh_anh_qc');
            $table->dateTime('ngay_dang');
            $table->boolean('trang_thai');
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
        Schema::dropIfExists('quang_cao');
    }
}
