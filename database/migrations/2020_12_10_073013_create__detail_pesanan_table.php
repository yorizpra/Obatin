<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailPesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemesanan')->unsigned();
            $table->foreign('id_pemesanan')->references('id')->on('Pesanan')->onDelete('cascade');
            $table->bigInteger('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id')->on('Obat');
            $table->integer('jumlah' );
            $table->integer('jumlah_total');
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
        Schema::dropIfExists('DetailPesanan');
    }
}
