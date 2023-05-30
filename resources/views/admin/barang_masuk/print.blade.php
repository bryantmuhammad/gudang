<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            margin-top: 20px;
            background: #87CEFA;
        }

        .card-footer-btn {
            display: flex;
            align-items: center;
            border-top-left-radius: 0 !important;
            border-top-right-radius: 0 !important;
        }

        .text-uppercase-bold-sm {
            text-transform: uppercase !important;
            font-weight: 500 !important;
            letter-spacing: 2px !important;
            font-size: .85rem !important;
        }

        .hover-lift-light {
            transition: box-shadow .25s ease, transform .25s ease, color .25s ease, background-color .15s ease-in;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding: 0.8rem 1.85rem;
            font-size: 1.1rem;
            border-radius: 0.3rem;
        }

        .btn-dark {
            color: #fff;
            background-color: #1e2e50;
            border-color: #1e2e50;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(30, 46, 80, .09);
            border-radius: 0.25rem;
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .p-5 {
            padding: 3rem !important;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .table td,
        .table th {
            border-bottom: 0;
            border-top: 1px solid #edf2f9;
        }

        .table>:not(caption)>*>* {
            padding: 1rem 1rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .px-0 {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .table thead th,
        tbody td,
        tbody th {
            vertical-align: middle;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .icon-circle[class*=text-] [fill]:not([fill=none]),
        .icon-circle[class*=text-] svg:not([fill=none]),
        .svg-icon[class*=text-] [fill]:not([fill=none]),
        .svg-icon[class*=text-] svg:not([fill=none]) {
            fill: currentColor !important;
        }

        .svg-icon>svg {
            width: 1.45rem;
            height: 1.45rem;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
        }
    </style>

</head>

<body onload="window.print()">
    <div class="container mt-6 mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>
                            Invoice Barang Masuk
                        </h2>


                        <div class="border-top border-gray-200 pt-4 mt-4">
                            <div class="invoice-header">
                                <div>
                                    <div class="text-muted mb-2">Tanggal Barang Masuk</div>
                                    <strong>{{ $barang_masuk->created_at->isoFormat('dddd, D MMMM Y') }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="border-top border-gray-200 mt-4 py-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-muted mb-1">Supplier</div>
                                    <strong>
                                        {{ $barang_masuk->supplier->nama_supplier }}
                                    </strong>
                                    <p class="fs-sm">
                                        {{ $barang_masuk->supplier->alamat_supplier }}
                                        <br>
                                        {{
                                        $barang_masuk->supplier->no_telepon_supplier }}
                                    </p>
                                </div>

                            </div>
                        </div>

                        <table class="table border-bottom border-gray-200 mt-1">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($barang_masuk->detail_barang_masuk as $detail_barang_masuk)
                                <tr>
                                    <td>{{ $detail_barang_masuk->produk->nama_produk }}</td>
                                    <td class="text-center">{{ rupiah($detail_barang_masuk->harga_beli) }}</td>
                                    <td class="text-center">{{ $detail_barang_masuk->jumlah }}</td>
                                    <td class="text-end">{{ rupiah($detail_barang_masuk->jumlah *
                                        $detail_barang_masuk->harga_beli) }}</td>
                                    @php
                                    $total += $detail_barang_masuk->jumlah *
                                    $detail_barang_masuk->harga_beli;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-2">

                            <div class="d-flex justify-content-end mt-3">
                                <h5 class="me-3">Total:</h5>
                                <h5>{{ rupiah($total) }}</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>