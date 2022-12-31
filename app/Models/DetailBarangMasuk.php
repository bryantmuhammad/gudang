<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class DetailBarangMasuk extends Model
{
    use HasFactory;
    protected $guarded      = ['id_detail_barang_masuk'];
    protected $primaryKey   = 'id_detail_barang_masuk';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
