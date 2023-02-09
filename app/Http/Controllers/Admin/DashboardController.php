<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Toko;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'produk' => Produk::all()->count(),
            'kategori' => Kategori::all()->count(),
            'supplier'  => Supplier::all()->count(),
            'toko' => Toko::all()->count()
        ];
        return view('admin.dashboard.index', $data);
    }
}
