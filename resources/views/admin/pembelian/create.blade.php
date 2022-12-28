@extends('layouts.app')

@section('title', $title)

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dashboard.pembelians.index') }}">Pembelian</a></div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.pembelians.store') }}" method="POST">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            @include('admin.pembelian.form')



                            <div class="table-responsive mt-4">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th class="text-center" style="width:100px">Action</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th class="text-center" style="width:200px">Jumlah</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    <tbody id="masukProduk">

                                    </tbody>
                                </table>
                            </div>


                            <div class="col-lg-4">
                                <button name="submit" type="submit" class="btn btn-primary">Tambah Pembelian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('js/pembelian.js') }}"></script>
    @endpush
@endsection
