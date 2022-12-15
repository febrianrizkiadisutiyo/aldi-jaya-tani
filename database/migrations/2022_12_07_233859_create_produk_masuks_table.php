<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('id_produk');
            $table->integer('jumlah_masuk');
            $table->date('tanggal_masuk');
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
        Schema::dropIfExists('produk_masuks');
    }
}
