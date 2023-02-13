<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('referensi')->nullable();
            $table->string('produk_id');
            $table->foreignId('satuan_id');
            $table->integer('kuantitas');
            $table->double('harga_beli');
            $table->double('harga_total');
            $table->date('tanggal_transaksi');
            $table->date('tanggal_jatuh_tempo');
            $table->foreignId('termin_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('penjualans');
    }
}
