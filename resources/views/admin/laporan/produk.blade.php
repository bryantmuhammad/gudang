@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <a class="btn btn-success mb-4" target="_blank"
                                    href="/dashboard/laporan/produk/print">Print</a>

                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Stok</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <td class="text-center">{{ $produk->nama_produk }}</td>
                                            <td class="text-center">{{ $produk->kategori->nama_kategori }}</td>
                                            <td class="text-center">{{ $produk->harga }}</td>
                                            <td class="text-center">{{ $produk->stok }}</td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $produk->foto) }}">
                                                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk"
                                                        width="130" height="100"></a>
                                            </td>
                                            <td class="text-center">{{ $produk->deskripsi }}</td>

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