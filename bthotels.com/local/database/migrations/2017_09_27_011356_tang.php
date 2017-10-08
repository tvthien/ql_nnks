<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tang', function (Blueprint $table) {
            $table->increments('id_tang');
            $table->integer('ma_nnks_tang')->unsigned();
            $table->integer('ma_kv_tang')->unsigned();
            $table->string('ghi_chu')->nullable();
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
        Schema::dropIfExists('tang');
    }
}
