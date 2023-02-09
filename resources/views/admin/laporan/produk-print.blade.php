<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Print Laporan Produk</title>

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
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                <tr>
                    <td class="text-center">{{ $produk->nama_produk }}</td>
                    <td class="text-center">{{ $produk->kategori->nama_kategori }}</td>
                    <td class="text-center">{{ $produk->harga }}</td>
                    <td class="text-center">{{ $produk->stok }}</td>
                    <td class="text-center">
                        <a href="{{ asset('storage/' . $produk->foto) }}">
                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" width="130"
                                height="100"></a>
                    </td>
                    <td class="text-center">{{ $produk->deskripsi }}</td>

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