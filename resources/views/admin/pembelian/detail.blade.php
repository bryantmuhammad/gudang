@extends('layouts.app')

@section('title', $title)

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Detail Pembelian</h2>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Supplier :</strong><br>
                                            {{ $pembelian->supplier->nama_supplier }}<br>
                                            {{ $pembelian->supplier->no_telepon_supplier }}<br>
                                            {{ $pembelian->supplier->alamat_supplier }}
                                        </address>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table-md table">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Nama Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Sub Total</th>
                                        </tr>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($pembelian->detail_pembelian as $detail_pembelian)
                                            @php
                                                $total += $detail_pembelian->produk->harga * $detail_pembelian->jumlah;
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $detail_pembelian->produk->nama_produk }}</td>
                                                <td class="text-center">{{ rupiah($detail_pembelian->produk->harga) }}</td>
                                                <td class="text-center">{{ $detail_pembelian->jumlah }}</td>
                                                <td class="text-right">
                                                    {{ rupiah($detail_pembelian->produk->harga * $detail_pembelian->jumlah) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="row mt-4">

                                    <div class="col-lg-12 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Grand Total</div>
                                            <div class="invoice-detail-value">{{ rupiah($total) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">

                        <a class="btn btn-warning btn-icon icon-left"
                            href="{{ route('dashboard.pembelians.print-invoice', $pembelian->id_pembelian) }}"
                            target="_blank"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
