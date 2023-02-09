<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Produk;

class LaporanController extends Controller
{

    public function produk()
    {
        return view('admin.laporan.produk', [
            'title' => 'Laporan Produk',
            'produks' => Produk::all()
        ]);
    }

    public function print_produk()
    {
        return view('admin.laporan.produk-print', [
            'title' => 'Laporan Produk',
            'produks' => Produk::all()
        ]);
    }

    public function barang_keluar()
    {

        $start_date = request()->query('start_date', false);
        $end_date   = request()->query('end_date', false);

        if ($start_date && $end_date) {
            $barang_keluar = BarangKeluar::with('user', 'toko', 'detail_barang_keluar.produk')->SearchByDate([$start_date, $end_date])->get();
        } else {
            $barang_keluar = BarangKeluar::with('user', 'toko', 'detail_barang_keluar.produk')->get();
        }

        return view('admin.laporan.barangkeluar', [
            'title'             => 'Laporan Barang Keluar',
            'barang_keluars'    => $barang_keluar
        ]);
    }

    public function print_barang_keluar()
    {
        $start_date = request()->query('start_date', false);
        $end_date   = request()->query('end_date', false);

        if ($start_date && $end_date) {
            $barang_keluar = BarangKeluar::with('user', 'toko', 'detail_barang_keluar.produk')->SearchByDate([$start_date, $end_date])->get();
        } else {
            $barang_keluar = BarangKeluar::with('user', 'toko', 'detail_barang_keluar.produk')->get();
        }

        return view('admin.laporan.barangkeluar-print', [
            'title'             => 'Laporan Barang Keluar',
            'barang_keluars'    => $barang_keluar
        ]);
    }


    public function barang_masuk()
    {

        $start_date = request()->query('start_date', false);
        $end_date   = request()->query('end_date', false);

        if ($start_date && $end_date) {
            $barang_masuk = BarangMasuk::with('supplier', 'detail_barang_masuk')->SearchByDate([$start_date, $end_date])->get();
        } else {
            $barang_masuk = BarangMasuk::with('supplier', 'detail_barang_masuk')->get();
        }

        return view('admin.laporan.barangmasuk', [
            'title'             => 'Laporan Barang Masuk',
            'barang_masuks'    => $barang_masuk
        ]);
    }

    public function print_barang_masuk()
    {
        $start_date = request()->query('start_date', false);
        $end_date   = request()->query('end_date', false);

        if ($start_date && $end_date) {
            $barang_masuk = BarangMasuk::with('supplier', 'detail_barang_masuk')->SearchByDate([$start_date, $end_date])->get();
        } else {
            $barang_masuk = BarangMasuk::with('supplier', 'detail_barang_masuk')->get();
        }

        return view('admin.laporan.barangmasuk-print', [
            'title'             => 'Laporan Barang Masuk',
            'barang_masuks'    => $barang_masuk
        ]);
    }
}
