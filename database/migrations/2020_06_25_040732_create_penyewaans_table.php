<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewaans');
    }
}
