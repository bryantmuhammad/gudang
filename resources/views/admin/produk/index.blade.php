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
                            <a href="{{ route('dashboard.produk.create') }}" class="btn btn-primary mb-3">Tambah
                                Produk</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Harga Beli</th>
                                            <th class="text-center">Stok</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <td class="text-center">{{ $produk->nama_produk }}</td>
                                            <td class="text-center">{{ $produk->kategori->nama_kategori }}</td>
                                            <td class="text-center">{{ rupiah($produk->harga) }}</td>
                                            <td class="text-center">{{ rupiah($produk->harga_beli) }}</td>
                                            <td class="text-center">{{ $produk->stok }}</td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $produk->foto) }}">
                                                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk"
                                                        width="130" height="100"></a>
                                            </td>
                                            <td class="text-center">{{ $produk->deskripsi }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.produk.edit', $produk->id_produk) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('dashboard.produk.delete', $produk->id_produk) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-button"
                                                        data-id="{{ $produk->id_produk }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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