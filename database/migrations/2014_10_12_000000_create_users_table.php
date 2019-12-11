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
            $table->increments('id');
            $table->string('no_ujian')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->enum('status', ['MENUNGGU PEMBAYARAN','VERIFIED']);
            $table->string('no_hp')->unique();
            $table->enum('kelompok', ['SAINTEK','SOSHUM']);
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
