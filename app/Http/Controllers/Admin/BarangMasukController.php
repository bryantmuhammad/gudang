<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Services\BarangMasukService;
use App\Supports\ValidationResponse;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{

    public BarangMasukService $barangmasuk_service;

    public function __construct(BarangMasukService $barangmasukService)
    {
        $this->barangmasuk_service = $barangmasukService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.barang_masuk.index', [
            'title' => 'Barang Masuk',
            'barang_masuks' => BarangMasuk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang_masuk.create', [
            'title' => 'Tambah Barang Masuk',
            'produks' => Produk::all(),
            'suppliers' => Supplier::all()
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
        $validate = $this->barangmasuk_service->validate($request);
        if ($validate->fails()) {
            return ValidationResponse::response($validate->errors());
        }

        $barang_masuk = $this->barangmasuk_service->create($validate->validated());

        if ($barang_masuk->status_code == 200) {
            $barangMasuk = $barang_masuk->data->load('detail_barang_masuk.produk');
            $sub_total = 0;
            foreach ($barangMasuk->detail_barang_masuk as $detail_barang_masuk) {
                $sub_total += $detail_barang_masuk->jumlah * $detail_barang_masuk->produk->harga;
            }

            $barangMasuk->update([
                'total' => $sub_total
            ]);
        }

        return response()->json($barang_masuk, $barang_masuk->status_code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        return view('admin.barang_masuk.detail', [
            'title'         => 'Detail Barang Masuk',
            'barang_masuk'  => $barangMasuk->load('supplier', 'detail_barang_masuk.produk')
        ]);
    }


    public function print(BarangMasuk $barangMasuk)
    {
        return view('admin.barang_masuk.print', [
            'barang_masuk' => $barangMasuk->load('supplier', 'detail_barang_masuk.produk')
        ]);
    }
}
