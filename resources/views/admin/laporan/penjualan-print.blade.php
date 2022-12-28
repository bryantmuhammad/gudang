<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Print Laporan Penjualan</title>

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
                        <font size="8">{{ remove_underscore(env('NAMA_INSTANSI')) }}</font>
                    </span>
                </p>
                <p style="text-align:center">
                    <span style="font-size:15px">
                        {{ remove_underscore(env('ALAMAT_INSTANSI')) }}
                    </span>
                </p>
            </div>
        </div>
        <hr>
        @if (request()->query('start_date') && request()->query('end_date'))
            <p class="text-center">
                <b>Tanggal
                    {{ date('j F Y', strtotime(request()->query('start_date'))) . ' SD ' . date('j F Y', strtotime(request()->query('end_date'))) }}</b>
            </p>
        @endif


        <table class="table-md table table-bordered">
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <th>Id Penjualan</th>
                        <th>Customer</th>
                        <th>Tanggal</th>
                    </tr>
                    <tr>
                        <td>{{ $penjualan->id_penjualan }}</td>
                        <td>{{ $penjualan->user->name }}</td>
                        <td>{{ $penjualan->created_at->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Produk</th>
                        <th scope="row" class="text-center">Jumlah</th>
                        <th scope="row" class="text-center">Harga</th>
                    </tr>
                    @foreach ($penjualan->detail_penjualan as $detail_penjualan)
                        <tr>
                            <td>{{ $detail_penjualan->produk->nama_produk }}
                            </td>
                            <td class="text-center">{{ $detail_penjualan->jumlah }}</td>
                            <td class="text-center">
                                {{ rupiah($detail_penjualan->produk->harga) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-center"><b>SubTotal</b></td>
                        <td class="text-center">
                            <b>{{ rupiah($penjualan->total - $penjualan->ongkir) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Ongkir</b></td>
                        <td class="text-center">
                            <b>{{ rupiah($penjualan->ongkir) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total</b></td>
                        <td class="text-center">
                            <b>{{ rupiah($penjualan->total) }}</b>
                        </td>
                    </tr>
                    <tr class="table-dark">
                        <td colspan="3"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>

</body>


</html>
