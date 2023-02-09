<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Print Laporan Barang Masuk</title>

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
    <div class="container" style="margin-top:20px;">

        <div class="kontain">
            <div class="isi" style="position:relative;">
                <p style="text-align:center">
                    <span style="font-family:Times New Roman,Times,serif">
                        <font size="8">Kayla Sport</font>
                    </span>
                </p>
                <p style="text-align:center">
                    <span style="font-size:15px">
                        Jl. Palagan Tentara Pelajar No.134, Nandan, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah
                        Istimewa Yogyakarta 55581
                    </span>
                </p>
            </div>
        </div>
        <hr>
        @if (request()->query('start_date') && request()->query('end_date'))
        <p class="text-center">
            <b>Tanggal
                {{ date('j F Y', strtotime(request()->query('start_date'))) . ' SD ' . date('j F Y',
                strtotime(request()->query('end_date'))) }}</b>
        </p>
        @endif


        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Tanggal Barang Masuk</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang_masuks as $barang_masuk)
                @foreach ($barang_masuk->detail_barang_masuk as $detail_barang_masuk)
                <tr>
                    <td class="text-center">{{ $barang_masuk->supplier->nama_supplier }}</td>

                    <td class="text-center">
                        {{ $barang_masuk->tanggal_barang_masuk->isoFormat('dddd, D MMMM Y') }}
                    </td>
                    <td class="text-center">
                        {{ $detail_barang_masuk->produk->nama_produk }}
                    </td>
                    <td class="text-center">{{ $detail_barang_masuk->jumlah }}</td>
                    <td class="text-center">{{ rupiah($detail_barang_masuk->jumlah *
                        $detail_barang_masuk->harga_beli) }}
                    </td>
                </tr>
                @endforeach

                @endforeach

            </tbody>
        </table>
        <div class="text-right">
            <p>{{ date('Y-m-d') }}</p>
            <br>
            <br>
            <br>
            <p>{{ auth()->user()->name }}</p>
        </div>
    </div>

    <script>
        window.print();
    </script>

</body>


</html>