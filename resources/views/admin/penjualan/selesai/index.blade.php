@extends('layouts.app')

@section('title', $title)

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Penjualan Selesai</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <x-datatable :dataTable="$dataTable"></x-datatable>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Kirim Resi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formkirimresi">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id_penjualan" id="id_penjualan">
                        <x-forms.input-group type="text" name="resi" id="resi" placeholder="Masukan No Resi"
                            label="No Resi" required="required"></x-forms.input-group>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim Resi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            function modalResi(event) {
                const idPenjualan = event.target.dataset.id;
                document.getElementById('id_penjualan').value = idPenjualan;
                document.getElementById('formkirimresi').action =
                    `${window.location.origin}/dashboard/penjualans/${idPenjualan}`
                $('#exampleModalCenter').modal('show')

            }
        </script>
    @endpush

@endsection
