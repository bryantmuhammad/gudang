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
        Schema::table('detail_barang_keluars', function (Blueprint $table) {
            $table->foreignId('id_barang_keluar')->after('id_produk')->references('id_barang_keluar')->on('barang_keluars')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_barang_keluars', function (Blueprint $table) {
            $table->dropColumn('id_barang_keluar');
        });
    }
};
