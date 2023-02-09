@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Barang Masuk</div>
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
                                    href="/dashboard/laporan/barangmasuk/print?start_date={{ request()->query('start_date') }}&end_date={{ request()->query('end_date') }}">Print</a>
                                @else
                                <a class="btn btn-success mb-4" target="_blank"
                                    href="/dashboard/laporan/barangmasuk/print">Print</a>
                                @endif

                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Supplier</th>
                                            <th class="text-center">Tanggal Barang Masuk</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_masuks as $barang_masuk)
                                        @foreach ($barang_masuk->detail_barang_masuk as $detail_barang_masuk)
                                        <tr>
                                            <td class="text-center">{{ $barang_masuk->supplier->nama_supplier }}</td>

                                            <td class="text-center">
                                                {{ $barang_masuk->tanggal_barang_masuk->isoFormat('dddd, D MMMM Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ $detail_barang_masuk->produk->nama_produk }}
                                            </td>
                                            <td class="text-center">{{ $detail_barang_masuk->jumlah }}</td>
                                            <td class="text-center">{{ rupiah($detail_barang_masuk->jumlah *
                                                $detail_barang_masuk->harga_beli) }}
                                            </td>
                                        </tr>
                                        @endforeach

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