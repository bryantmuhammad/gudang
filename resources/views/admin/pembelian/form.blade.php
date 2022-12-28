<div class="row">
    <div class="col-lg-6">
        <label for="id_supplier">Supplier</label>
        <select name="id_supplier" id="id_supplier" class="form-control">
            <option value="">- Pilih Supplier -</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id_supplier }}"
                    {{ old('id_supplier') == $supplier->id_supplier ? 'selected' : '' }}>{{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-6">
        <x-forms.input-group name="tanggal_pembelian" type="date" id="tanggal_pembelian"
            placeholder="Masukan Tanggal Pembelian" label="Tanggal Pembelian" required="required"
            value="{{ old('tanggal_pembelian') }}"></x-forms.input-group>
    </div>

    <div class="col-lg-4">
        <label for="id_produk">Produk</label>
        <select name="id_produk" id="id_produk" class="form-control">
            <option value="">- Pilih Produk -</option>
            @foreach ($produks as $produk)
                <option data-harga="{{ $produk->harga }}" data-nama="{{ $produk->nama_produk }}"
                    value="{{ $produk->id_produk }}" {{ old('id_produk') == $produk->id_produk ? 'selected' : '' }}>
                    {{ $produk->nama_produk }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4" style="padding-top:30px;">
        <button class="btn btn-primary" id="add-produk">Tambah Produk</button>
    </div>
</div>
