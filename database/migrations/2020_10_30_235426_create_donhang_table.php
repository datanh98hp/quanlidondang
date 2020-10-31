<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // $table->foreign('id_user')->references('id')->on('users');
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');$table->foreign('id_user')->references('id')->on('users');
            $table->dateTime('Tg_giao');
            $table->string('Trang_thai');
            $table->dateTime('Tong_gia');
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
        Schema::dropIfExists('donhang');
    }
}
