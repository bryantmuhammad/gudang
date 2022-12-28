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
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->foreignId('id_kategori')->references('id_kategori')->on('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_produk', 100);
            $table->double('harga');
            $table->string('foto', 150);
            $table->integer('stok');
            $table->string('deskripsi', 150);
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
        Schema::dropIfExists('produks');
    }
};
