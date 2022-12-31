<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\User;
use App\Models\DetailBarangKeluar;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $guarded = ['id_barang_keluar'];
    protected $primaryKey = 'id_barang_keluar';
    protected $dates  = [
        'tanggal_barang_keluar'
    ];

    public function detail_barang_keluar()
    {
        return $this->hasMany(DetailBarangKeluar::class, 'id_barang_keluar');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
