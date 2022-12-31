<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailBarangMasuk;
use App\Models\Supplier;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $guarded      = ['id_barang_masuk'];
    protected $primaryKey   = 'id_barang_masuk';

    protected $dates  = [
        'tanggal_barang_masuk'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }


    public function detail_barang_masuk()
    {
        return $this->hasMany(DetailBarangMasuk::class, 'id_barang_masuk');
    }
}
