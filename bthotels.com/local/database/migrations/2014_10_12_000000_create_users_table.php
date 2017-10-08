<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user',8);
            $table->integer('ma_nnks_user')->unsigned()->nullable();
            $table->integer('ma_quyen_user')->unsigned();
            $table->integer('ma_nv_user')->unsigned()->nullable();
            $table->string('ho_ten');
            $table->string('password');
            $table->dateTime('ngay_gio_tao');
            $table->string('nguoi_tao',8);
            $table->foreign('nguoi_tao')->references('id_user')->on('users');
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
        Schema::dropIfExists('users');
    }
}
