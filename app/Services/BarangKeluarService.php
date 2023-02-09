<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangKeluarService
{

    public function validate(Request $request)
    {
        $rules = [
            "tanggal_barang_keluar"     => ['required', 'date'],
            "id_toko"                   => ['required', 'exists:suppliers,id_supplier'],
            "produk"                    => ['required', 'array'],
            "produk.*"                  => ['required', 'exists:produks,id_produk'],
            "qty.*"                     => ['required', 'numeric'],
            "harga_jual.*"              => ['required', 'numeric'],
        ];



        return Validator::make($request->all(), $rules);
    }


    public function generate_produk($request, $id_barang_keluar)
    {

        $temp_detail_barang_keluar = [];
        foreach ($request['produk'] as $key => $id_produk) {
            $qty        = $request['qty'][$key];
            $harga_jual = $request['harga_jual'][$key];

            $temp_detail_barang_keluar[] = [
                'id_barang_keluar'  => $id_barang_keluar,
                'id_produk'         => $id_produk,
                'jumlah'            => $qty,
                'harga_jual'        => $harga_jual,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
        }

        return $temp_detail_barang_keluar;
    }

    public function create($request)
    {
        $response = create_response();

        DB::beginTransaction();
        try {
            $barang_keluar = [
                'id_toko'               => $request['id_toko'],
                'user_id'               => Auth::user()->id,
                'tanggal_barang_keluar' => $request['tanggal_barang_keluar'],
                'total'                 => 0
            ];

            $barang_keluar        = BarangKeluar::create($barang_keluar);
            $detail_barang_keluar = $this->generate_produk($request, $barang_keluar->id_barang_keluar);
            $detail_barang_keluar = DetailBarangKeluar::insert($detail_barang_keluar);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return $response;
        }

        DB::commit();
        $response->status       = 'success';
        $response->status_code  = 200;
        $response->data         = $barang_keluar;
        $response->message      = 'Barang Masuk Berhasi Ditambahkan';

        return $response;
    }
}
