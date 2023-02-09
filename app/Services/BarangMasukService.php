<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use Illuminate\Support\Facades\DB;

class BarangMasukService
{

    public function validate(Request $request)
    {
        $rules = [
            "tanggal_barang_masuk"  => ['required', 'date'],
            "id_supplier"           => ['required', 'exists:suppliers,id_supplier'],
            "produk"                => ['required', 'array'],
            "produk.*"              => ['required', 'exists:produks,id_produk'],
            "qty.*"                 => ['required', 'numeric'],
            "harga_beli.*"          => ['required', 'numeric']
        ];



        return Validator::make($request->all(), $rules);
    }


    public function generate_produk($request, $id_barang_masuk)
    {

        $temp_detail_barang_masuk = [];
        foreach ($request['produk'] as $key => $id_produk) {
            $qty        = $request['qty'][$key];
            $harga_beli = $request['harga_beli'][$key];

            $temp_detail_barang_masuk[] = [
                'id_barang_masuk'   => $id_barang_masuk,
                'id_produk'         => $id_produk,
                'jumlah'            => $qty,
                'harga_beli'        => $harga_beli,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
        }

        return $temp_detail_barang_masuk;
    }

    public function create($request)
    {
        $response = create_response();

        DB::beginTransaction();
        try {
            $barang_masuk = [
                'id_supplier'           => $request['id_supplier'],
                'tanggal_barang_masuk'  => $request['tanggal_barang_masuk'],
                'total'                 => 0
            ];


            $barang_masuk = BarangMasuk::create($barang_masuk);

            $detail_barang_masuk = $this->generate_produk($request, $barang_masuk->id_barang_masuk);
            $detail_barang_masuk = DetailBarangMasuk::insert($detail_barang_masuk);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return $response;
        }

        DB::commit();
        $response->status       = 'success';
        $response->status_code  = 200;
        $response->data         = $barang_masuk;
        $response->message      = 'Barang Masuk Berhasi Ditambahkan';

        return $response;
    }
}
