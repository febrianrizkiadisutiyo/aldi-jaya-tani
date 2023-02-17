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
            // $table->foreignId('id_prodMasuk');
            $table->string('kode_pk')->unique();
            $table->integer('jumlah_keluar');
            $table->date('tanggal_keluar');
            $table->integer('harga')->default(0);
            $table->integer('total_harga')->default(0);
            $table->integer('pendapatan')->default(0);
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
