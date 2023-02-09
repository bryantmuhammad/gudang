<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_masuks', function (Blueprint $table) {
            $table->bigIncrements('id_detail_barang_masuk');
            $table->foreignId('id_barang_masuk')->references('id_barang_masuk')->on('barang_masuks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_produk')->references('id_produk')->on('produks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->double('harga_beli');
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
        Schema::dropIfExists('detail_barang_masuks');
    }
};
