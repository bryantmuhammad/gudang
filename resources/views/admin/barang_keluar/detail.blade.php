@extends('layouts.app')

@section('title', 'Invoice')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Barang Keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Detail Barang Keluar</div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice Barang Keluar</h2>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Toko:</strong><br>
                                        {{ $barang_keluar->toko->nama_toko }}<br>
                                        {{ $barang_keluar->toko->no_telepon_toko }}<br>
                                        {{ $barang_keluar->toko->alamat_toko }}<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Tanggal:</strong><br>
                                        {{ $barang_keluar->tanggal_barang_keluar->isoFormat('dddd, D MMMM Y') }}
                                    </address>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">List Barang Keluar</div>
                            <div class="table-responsive">
                                <table class="table-striped table-hover table-md table">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($barang_keluar->detail_barang_keluar as $detail_barang_keluar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail_barang_keluar->produk->nama_produk }}</td>
                                        <td class="text-center">{{ rupiah($detail_barang_keluar->harga_jual) }}</td>
                                        <td class="text-center">{{ $detail_barang_keluar->jumlah }}</td>
                                        <td class="text-right">{{ rupiah($detail_barang_keluar->jumlah *
                                            $detail_barang_keluar->harga_jual) }}</td>
                                        @php
                                        $total += $detail_barang_keluar->jumlah *
                                        $detail_barang_keluar->harga_jual;
                                        @endphp
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">

                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">{{ rupiah($total)
                                                }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">

                        <a target="_blank"
                            href="{{ route('dashboard.barangkeluar.print', $barang_keluar->id_barang_keluar) }}"
                            class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush