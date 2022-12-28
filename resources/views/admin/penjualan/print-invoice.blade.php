<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Print Invoice Penjualan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-title">
                                            <h2>Detail Penjualan</h2>
                                            <div class="invoice-number">Order #{{ $penjualan->id_penjualan }}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Alamat Pengiriman:</strong><br>
                                                    {{ $penjualan->alamat_pengiriman->nama_penerima }}<br>
                                                    {{ $penjualan->alamat_pengiriman->no_telepon_penerima }}<br>
                                                    {{ $penjualan->alamat_pengiriman->alamat }}
                                                    {{ $penjualan->alamat_pengiriman->kecamatan }} <br>
                                                    {{ $penjualan->alamat_pengiriman->kabupaten->nama_kabupaten }},
                                                    {{ $penjualan->alamat_pengiriman->kabupaten->provinsi->nama_provinsi }}<br>
                                                    {{ $penjualan->alamat_pengiriman->kode_pos }}

                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Pengiriman:</strong><br>
                                                    {{ $penjualan->pengiriman }}<br>
                                                    {{ $penjualan->estimasi }} Hari<br>
                                                    No Resi : {{ $penjualan->resi }}<br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Pembayaran:</strong><br>
                                                    @if ($penjualan->status > 1)
                                                        Sudah Membayar
                                                    @else
                                                        Belum Membayar
                                                    @endif
                                                    <br>

                                                    @if ($penjualan->status == 1)
                                                        Belum Membayar
                                                    @endif
                                                    @if ($penjualan->status == 2)
                                                        Sudah Membayar
                                                    @endif
                                                    @if ($penjualan->status == 3)
                                                        Sedang Dikirim
                                                    @endif
                                                    @if ($penjualan->status == 4)
                                                        Sudah Diterima
                                                    @endif
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Tanggal Penjualan:</strong><br>
                                                    {{ $penjualan->created_at->isoFormat('dddd, D MMMM Y') }}<br><br>
                                                </address>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table-striped table-hover table-md table">
                                                <tr>
                                                    <th data-width="40">#</th>
                                                    <th>Nama Produk</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-right">Sub Total</th>
                                                </tr>

                                                @foreach ($penjualan->detail_penjualan as $detail_penjualan)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $detail_penjualan->produk->nama_produk }}</td>
                                                        <td class="text-center">
                                                            {{ rupiah($detail_penjualan->produk->harga) }}</td>
                                                        <td class="text-center">{{ $detail_penjualan->jumlah }}</td>
                                                        <td class="text-right">
                                                            {{ rupiah($detail_penjualan->produk->harga * $detail_penjualan->jumlah) }}
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </table>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-12 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Sub Total</div>
                                                    <div class="invoice-detail-value">
                                                        {{ rupiah($penjualan->total - $penjualan->ongkir) }}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Ongkos Kirim</div>
                                                    <div class="invoice-detail-value">
                                                        {{ rupiah($penjualan->ongkir) }}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value">
                                                        {{ rupiah($penjualan->total) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>

    <script>
        window.print();
    </script>

</body>


</html>
