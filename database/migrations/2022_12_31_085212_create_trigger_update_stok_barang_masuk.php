<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE
        TRIGGER `gudang`.`updateStokBarangMasuk` AFTER INSERT
        ON `gudang`.`detail_barang_masuks`
        FOR EACH ROW BEGIN
            UPDATE produks SET stok = stok + new.jumlah WHERE id_produk = new.id_produk;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updateStokBarangMasuk');
    }
};
