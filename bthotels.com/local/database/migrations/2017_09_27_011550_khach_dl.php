<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KhachDl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_dl', function (Blueprint $table) {
            $table->increments('id_kdl');
            $table->integer('ma_qt_kdl')->unsigned();
            $table->string('ten');
            $table->string('cmnd');
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
        Schema::dropIfExists('khach_dl');
    }
}
