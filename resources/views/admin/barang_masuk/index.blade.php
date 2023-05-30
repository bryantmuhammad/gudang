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
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.barangmasuk.create') }}" class="btn btn-primary mb-3">Tambah
                                Barang Masuk</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Supplier</th>
                                            <th class="text-center">Tanggal Barang Masuk</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Detail Barang Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_masuks as $barang_masuk)
                                        <tr>
                                            <td class="text-center">{{ $barang_masuk->supplier->nama_supplier }}</td>
                                            <td class="text-center">
                                                {{ $barang_masuk->tanggal_barang_masuk->isoFormat('dddd, D MMMM Y') }}
                                            </td>
                                            <td class="text-center">{{ rupiah($barang_masuk->total) }}</td>
                                            <td class="text-center">
                                                {{-- <a
                                                    href="{{ route('dashboard.barangmasuk.show', $barang_masuk->id_barang_masuk) }}"
                                                    class="btn btn-sm btn-success">Detail</a> --}}
                                                <a target="_blank"
                                                    href="{{ route('dashboard.barangmasuk.print', $barang_masuk->id_barang_masuk) }}"
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