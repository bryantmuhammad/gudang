@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Barang Keluar</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.barangkeluar.create') }}" class="btn btn-primary mb-3">Tambah
                                Barang Keluar</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Toko</th>
                                            <th class="text-center">Nama Karyawan</th>
                                            <th class="text-center">Tanggal Barang Keluar</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Detail Barang Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_keluars as $barang_keluar)
                                        <tr>
                                            <td class="text-center">{{ $barang_keluar->toko->nama_toko }}</td>
                                            <td class="text-center">{{ $barang_keluar->user->name }}</td>
                                            <td class="text-center">
                                                {{ $barang_keluar->tanggal_barang_keluar->isoFormat('dddd, D MMMM Y') }}
                                            </td>
                                            <td class="text-center">{{ rupiah($barang_keluar->total) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.barangkeluar.show', $barang_keluar->id_barang_keluar) }}"
                                                    class="btn btn-sm btn-success">Detail</a>
                                                <a target="_blank"
                                                    href="{{ route('dashboard.barangkeluar.print', $barang_keluar->id_barang_keluar) }}"
                                                    class="btn btn-sm btn-primary">Invoice</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    $(function(){
            $("#myTable").dataTable();
        })
</script>
@endpush

@endsection