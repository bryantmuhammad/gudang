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
                                    <h2>Detail Penjualan</h2>
                                    <div class="invoice-number">Order #{{ $penjualan->id_penjualan }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Alamat Pengiriman:</strong><br>
                                            {{ $penjualan->alamat_pengiriman->nama_penerima }}<br>
                                            {{ $penjualan->alamat_pengiriman->no_telepon_penerima }}<br>
                                            {{ $penjualan->alamat_pengiriman->alamat }}
                                            {{ $penjualan->alamat_pengiriman->kecamatan }} <br>
                                            {{ $penjualan->alamat_pengiriman->kabupaten->nama_kabupaten }},
                                            {{ $penjualan->alamat_pengiriman->kabupaten->provinsi->nama_provinsi }}<br>
                                            {{ $penjualan->alamat_pengiriman->kode_pos }}

                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Pengiriman:</strong><br>
                                            {{ $penjualan->pengiriman }}<br>
                                            {{ $penjualan->estimasi }} Hari<br>
                                            No Resi : {{ $penjualan->resi }}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Pembayaran:</strong><br>
                                            @if ($penjualan->status > 1)
                                                Sudah Membayar
                                            @else
                                                Belum Membayar
                                            @endif
                                            <br>
                                            <a class="badge badge-info" href="{{ $penjualan->pdf }}" target="_blank">Cara
                                                Membayar</a>
                                            @if ($penjualan->status == 1)
                                                <span class="badge badge-danger">
                                                    Belum Membayar
                                                </span>
                                            @endif
                                            @if ($penjualan->status == 2)
                                                <span class="badge badge-info">
                                                    Sudah Membayar
                                                </span>
                                            @endif
                                            @if ($penjualan->status == 3)
                                                <span class="badge badge-warning">
                                                    Sedang Dikirim
                                                </span>
                                            @endif
                                            @if ($penjualan->status == 4)
                                                <span class="badge badge-success">
                                                    Sudah Diterima
                                                </span>
                                            @endif
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Tanggal Penjualan:</strong><br>
                                            {{ $penjualan->created_at->isoFormat('dddd, D MMMM Y') }}<br><br>
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

                                        @foreach ($penjualan->detail_penjualan as $detail_penjualan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $detail_penjualan->produk->nama_produk }}</td>
                                                <td class="text-center">{{ rupiah($detail_penjualan->produk->harga) }}</td>
                                                <td class="text-center">{{ $detail_penjualan->jumlah }}</td>
                                                <td class="text-right">
                                                    {{ rupiah($detail_penjualan->produk->harga * $detail_penjualan->jumlah) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="row mt-4">

                                    <div class="col-lg-12 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Sub Total</div>
                                            <div class="invoice-detail-value">
                                                {{ rupiah($penjualan->total - $penjualan->ongkir) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Ongkos Kirim</div>
                                            <div class="invoice-detail-value">
                                                {{ rupiah($penjualan->ongkir) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value">
                                                {{ rupiah($penjualan->total) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <a class="btn btn-warning btn-icon icon-left"
                            href="{{ route('dashboard.penjualans.print-invoice', $penjualan->id_penjualan) }}"
                            target="_blank"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
