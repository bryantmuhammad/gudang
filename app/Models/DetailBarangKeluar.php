<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\BarangKeluar;

class DetailBarangKeluar extends Model
{
    use HasFactory;
    protected $guarded = ['id_detail_barang_keluar'];
    protected $primaryKey = 'id_detail_barang_keluar';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function barang_keluar()
    {
        return $this->belongsTo(BarangKeluar::class, 'id_barang_keluar');
    }
}
