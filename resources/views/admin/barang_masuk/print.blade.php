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
                                            <h2>Invoice Barang Masuk</h2>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Supplier:</strong><br>
                                                    {{ $barang_masuk->supplier->nama_supplier }}<br>
                                                    {{ $barang_masuk->supplier->no_telepon_supplier }}<br>
                                                    {{ $barang_masuk->supplier->alamat_supplier }}<br>
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Tanggal:</strong><br>
                                                    {{ $barang_masuk->created_at->isoFormat('dddd, D MMMM Y') }}
                                                </address>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="section-title">List Barang Masuk</div>
                                        <div class="table-responsive">
                                            <table class="table-striped table-hover table-md table">
                                                <tr>
                                                    <th data-width="40">#</th>
                                                    <th>Produk</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Qty</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                                @php
                                                $total = 0;
                                                @endphp
                                                @foreach ($barang_masuk->detail_barang_masuk as $detail_barang_masuk)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detail_barang_masuk->produk->nama_produk }}</td>
                                                    <td class="text-center">{{ rupiah($detail_barang_masuk->harga_beli)
                                                        }}</td>
                                                    <td class="text-center">{{ $detail_barang_masuk->jumlah }}</td>
                                                    <td class="text-right">{{ rupiah($detail_barang_masuk->jumlah *
                                                        $detail_barang_masuk->harga_beli) }}</td>
                                                    @php
                                                    $total += $detail_barang_masuk->jumlah *
                                                    $detail_barang_masuk->harga_beli;
                                                    @endphp
                                                </tr>
                                                @endforeach


                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">

                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <div class="invoice-detail-item">

                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Total</div>
                                                        <div class="invoice-detail-value invoice-detail-value-lg">{{
                                                            rupiah($total)
                                                            }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

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