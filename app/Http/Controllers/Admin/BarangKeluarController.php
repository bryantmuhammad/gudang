<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use App\Services\BarangKeluarService;
use App\Supports\ValidationResponse;

class BarangKeluarController extends Controller
{
    public BarangKeluarService $barang_keluar;

    public function __construct(BarangKeluarService $barangKeluar)
    {
        $this->barang_keluar = $barangKeluar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang_keluar.index', [
            'title'             => 'Barang Keluar',
            'barang_keluars'    => BarangKeluar::with('user', 'toko')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang_keluar.create', [
            'title' => 'Tambah Barang Keluar',
            'tokos' => Toko::all(),
            'produks' => Produk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->barang_keluar->validate($request);

        if ($validation->fails()) {
            return ValidationResponse::response($validation->errors());
        }

        $barang_keluar = $this->barang_keluar->create($request);
        if ($barang_keluar->status_code == 200) {
            $barangKeluar = $barang_keluar->data->load('detail_barang_keluar.produk');
            $sub_total = 0;
            foreach ($barangKeluar->detail_barang_keluar as $detail_barang_keluar) {
                $sub_total += $detail_barang_keluar->jumlah * $detail_barang_keluar->produk->harga;
            }

            $barangKeluar->update([
                'total' => $sub_total
            ]);
        }

        return response()->json($barang_keluar, $barang_keluar->status_code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        return view('admin.barang_masuk.detail', [
            'title' => 'Detail Barang Keluar',
            'barang_keluar' => $barangKeluar->load('toko', 'user', 'detail_barang_keluar.produk')
        ]);
    }

    public function print(BarangKeluar $barangKeluar)
    {
        return view('admin.barang_masuk.print', [
            'title' => 'Detail Barang Keluar',
            'barang_keluar' => $barangKeluar->load('toko', 'user', 'detail_barang_keluar.produk')
        ]);
    }
}
