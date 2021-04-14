<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('id_transaksi');
            // $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('subtotal');
            $table->unsignedBigInteger('harga');
            $table->foreignId('id_transaksi')->references('id')->on('transaksi');
            $table->foreignId('id_produk')->references('id')->on('produk');
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
        Schema::dropIfExists('transaksi_produk');
    }
}
