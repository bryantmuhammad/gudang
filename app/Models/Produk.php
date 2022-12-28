<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id_produk'];
    protected $primaryKey = 'id_produk';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
