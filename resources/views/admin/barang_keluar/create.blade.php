@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard.barangkeluar.index') }}">Barang Keluar</a>
                </div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.barangkeluar.store') }}" method="POST" id="formbarangkeluar">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.input-group id="tanggal_barang_keluar" name="tanggal_barang_keluar"
                                    required="required" id="name" type="date"
                                    placeholder="Masukan Tanggal Barang Keluar" label="Tanggal Barang Keluar"
                                    value="{{ date('Y-m-d') }}">
                                </x-forms.input-group>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="toko">Toko</label>
                                    <select name="id_toko" id="id_toko" class="form-control">
                                        @foreach ($tokos as $toko)
                                        <option value="{{ $toko->id_toko }}">{{ $toko->nama_toko }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="produk">Produk</label>
                                    <select id="produk" class="form-control">
                                        @foreach ($produks as $produk)
                                        <option value="{{ $produk->id_produk }}" data-harga={{ $produk->harga }}
                                            data-foto="{{ $produk->foto }}" data-stok="{{ $produk->stok }}">{{
                                            $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-1">
                                <button class="btn btn-success mt-4" id="tambahproduk">Tambah Produk</button>
                            </div>

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Foto Barang</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center" width="10%">Jumlah</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablemasuk">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <button class="btn btn-primary" type="submit" name="submit" id="submitform">Tambah
                                    Barang Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script src="{{ asset('js/barangkeluar.js') }}"></script>
@endpush

@endsection