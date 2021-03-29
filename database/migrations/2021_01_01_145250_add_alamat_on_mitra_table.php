<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatOnMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mitra', function (Blueprint $table) {
            //
        $table->string('alamat')->nullable()->after('password');
        $table->string('tanggal_lahir')->nullable()->after('alamat');
        $table->integer('noHp')->nullable()->after('tanggal_lahir');
        // $table->string('no_rekening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
