@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Supplier</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.supplier.create') }}" class="btn btn-primary mb-3">Tambah
                                Supplier</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Supplier</th>
                                            <th class="text-center">No Telepon Supplier</th>
                                            <th class="text-center">Alamat Supplier</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td class="text-center">{{ $supplier->nama_supplier }}</td>
                                            <td class="text-center">{{ $supplier->no_telepon_supplier }}</td>
                                            <td class="text-center">{{ $supplier->alamat_supplier }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.supplier.edit', $supplier->id_supplier) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('dashboard.supplier.delete', $supplier->id_supplier) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-button"
                                                        data-id="{{ $supplier->id_supplier }}">
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