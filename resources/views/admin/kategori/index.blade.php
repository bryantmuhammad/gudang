@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Kategori</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.kategori.create') }}" class="btn btn-primary mb-3">Tambah
                                Kategori</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Kategori</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td class="text-center">{{ $kategori->nama_kategori }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.kategori.edit', $kategori->id_kategori) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('dashboard.kategori.delete', $kategori->id_kategori) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-button"
                                                        data-id="{{ $kategori->id_kategori }}">
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
    $('#myTable').DataTable();

</script>
@endpush

@endsection