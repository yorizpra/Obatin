<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKritikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unggahresep', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id')->on('konsumen')->onDelete('restrict');
            $table->string('resep');
            $table->string('keterangan');
            $table->integer('balasan');
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
        Schema::dropIfExists('kritik');
    }
}
