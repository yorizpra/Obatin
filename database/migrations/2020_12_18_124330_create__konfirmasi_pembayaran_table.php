<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KonfirmasiPembayaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemesanan')->unsigned();
            $table->foreign('id_pemesanan')->references('id')->on('pesanan')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('nominal');
            $table->string('bukti_tf');
            $table->integer('status');
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
        Schema::dropIfExists('KonfirmasiPembayaran');
    }
}
