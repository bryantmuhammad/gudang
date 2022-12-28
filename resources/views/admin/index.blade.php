@extends('layouts.app')

@section('title', $title)
@section('main')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Penjualan

                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"></div>
                                <div class="card-stats-item-label">Belum Membayar</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"></div>
                                <div class="card-stats-item-label">Sudah Membayar</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"></div>
                                <div class="card-stats-item-label">Dikirim / Selesai</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Orders</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">

                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">

                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Produk</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="120"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.js') }}"></script>
<script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index.js') }}"></script>
@endpush