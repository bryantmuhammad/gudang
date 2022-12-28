<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokoRequest;
use App\Models\Toko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.toko.index', [
            'tokos' => Toko::all(),
            'title' => 'Toko Management'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.toko.create', [
            'title' => 'Tambah Toko',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TokoRequest $request)
    {
        $toko = Toko::create($request->validated());
        Alert::success('Success', 'Berhasil menambahkan toko');

        return redirect()->route('dashboard.toko.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        return view('admin.toko.update', [
            'title' => 'Update Toko',
            'toko' => $toko
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(TokoRequest $request, Toko $toko)
    {
        $toko->update($request->validated());
        Alert::success('Success', 'Berhasil merubah toko');

        return redirect()->route('dashboard.toko.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        $toko->delete();
        Alert::success('Success', 'Berhasil menghapus toko');

        return redirect()->route('dashboard.toko.index');
    }
}
