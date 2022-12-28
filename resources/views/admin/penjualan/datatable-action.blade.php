@if ($status == 2)
    <button class="btn btn-success btn-sm" data-id="{{ $id_penjualan }}" onclick="modalResi(event)">Kirim Resi</button>
@endif

<form action="{{ route('dashboard.penjualans.destroy', $id_penjualan) }}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm" onclick="deleteData(event)">Hapus</button>
</form>
