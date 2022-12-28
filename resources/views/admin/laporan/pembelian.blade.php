@extends('layouts.app')

@section('title', $title)

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Laporan Pembelian</div>
                </div>
            </div>


            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-forms.input-group value="{{ request()->query('start_date') ?? date('Y-m-d') }}"
                                        name="start_date" id="start_date" label="Tanggal Awal" type="date">
                                    </x-forms.input-group>
                                </div>
                                <div class="col-lg-4">
                                    <x-forms.input-group value="{{ request()->query('end_date') ?? date('Y-m-d') }}"
                                        name="end_date" id="end_date" label="Tanggal Akhir" type="date">
                                    </x-forms.input-group>
                                </div>
                                <div class="col-lg-3" style="margin-top:30px;">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if (request()->query('start_date') && request()->query('end_date'))
                                        <a class="btn btn-success mb-4" target="_blank"
                                            href="/dashboard/laporan/pembelian/print?start_date={{ request()->query('start_date') }}&end_date={{ request()->query('end_date') }}">Print</a>
                                    @else
                                        <a class="btn btn-success mb-4" target="_blank"
                                            href="/dashboard/laporan/pembelian/print">Print</a>
                                    @endif

                                    <table class="table-md table table-bordered">
                                        <tbody>
                                            @foreach ($pembelians as $pembelian)
                                                <tr>
                                                    <th>Id Pembelian</th>
                                                    <th>Supplier</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $pembelian->id_pembelian }}</td>
                                                    <td>{{ $pembelian->supplier->nama_supplier }}</td>
                                                    <td>{{ $pembelian->created_at->isoFormat('D MMMM Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Produk</th>
                                                    <th scope="row" class="text-center">Jumlah</th>
                                                    <th scope="row" class="text-center">Harga</th>
                                                </tr>
                                                @foreach ($pembelian->detail_pembelian as $detail_pembelian)
                                                    <tr>
                                                        <td>{{ $detail_pembelian->produk->nama_produk }}
                                                        </td>
                                                        <td class="text-center">{{ $detail_pembelian->jumlah }}</td>
                                                        <td class="text-center">
                                                            {{ rupiah($detail_pembelian->produk->harga) }}</td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="2" class="text-center"><b>Total</b></td>
                                                    <td class="text-center">
                                                        <b>{{ rupiah($pembelian->total_pembelian) }}</b>
                                                    </td>
                                                </tr>
                                                <tr class="table-dark">
                                                    <td colspan="3"></td>
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




@endsection
