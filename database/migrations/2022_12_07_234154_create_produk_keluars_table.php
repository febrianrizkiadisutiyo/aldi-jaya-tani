<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('id_produk');
            $table->integer('jumlah_keluar');
            $table->date('tanggal_keluar');
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
        Schema::dropIfExists('produk_keluars');
    }
}
