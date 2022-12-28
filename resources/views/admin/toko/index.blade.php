@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Toko</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.toko.create') }}" class="btn btn-primary mb-3">Tambah
                                Toko</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Toko</th>
                                            <th class="text-center">No Telepon Toko</th>
                                            <th class="text-center">Alamat Toko</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tokos as $toko)
                                        <tr>
                                            <td class="text-center">{{ $toko->nama_toko }}</td>
                                            <td class="text-center">{{ $toko->no_telepon_toko }}</td>
                                            <td class="text-center">{{ $toko->alamat_toko }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.toko.edit', $toko->id_toko) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('dashboard.toko.delete', $toko->id_toko) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-button"
                                                        data-id="{{ $toko->id_toko }}">
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