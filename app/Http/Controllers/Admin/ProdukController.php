<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.produk.index', [
            'title' => 'Produk Management',
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create', [
            'title' => 'Tambah Produk',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {

        $validatedData              = $request->validated();
        $validatedData['foto']      = $request->file('foto')->store('foto_produk');
        $validatedData['stok']      = 0;

        $produk                     = Produk::create($validatedData);
        Alert::success('Success', 'Berhasil menambahkan produk');

        return redirect()->route('dashboard.produk.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.update', [
            'title' => "Edit Produk",
            'produk' => $produk,
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $validatedData       = $request->validated();
        if ($request->file('foto')) {
            Storage::delete($produk->foto);
            $validatedData['foto'] = $request->file('foto')->store('foto_produk');
        }

        $produk->update($validatedData);

        Alert::success('Success', 'Berhasil merubah produk');

        return redirect()->route('dashboard.produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Storage::delete($produk->foto);
        $produk->delete();
        Alert::success('Success', 'Berhasil menghapus produk');

        return redirect()->route('dashboard.produk.index');
    }
}
