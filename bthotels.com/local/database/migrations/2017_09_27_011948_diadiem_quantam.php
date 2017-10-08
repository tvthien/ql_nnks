<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiadiemQuantam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_quan_tam', function (Blueprint $table) {
            $table->increments('id_ddqt');
            $table->string('ten');
            $table->string('dia_chi');
            $table->string('hinh_anh_ddqt');
            $table->string('mo_ta')->nullable();
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
        Schema::dropIfExists('dd_quan_tam');
    }
}
