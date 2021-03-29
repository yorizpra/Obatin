<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id')->on('konsumen')->onDelete('restrict');
            $table->integer('jumlah_harga');
            $table->integer('kode');
            $table->string('metodepembayaran')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal');
            $table->string('status');


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
        Schema::dropIfExists('Pesanan');
    }
}
