<div class="row">
    <div class="col-lg-6">
        <x-forms.input-group id="nama_toko" name="nama_toko" required="required" placeholder="Masukan Nama Toko"
            label="Nama Toko" value="{{ old('nama_supplier', $toko->nama_toko ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-6">
        <x-forms.input-group id="no_telepon_toko" name="no_telepon_toko" required="required"
            placeholder="Masukan No Telepon Toko" label="No Telepon Toko"
            value="{{ old('no_telepon_toko', $toko->no_telepon_toko ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-12">
        <x-forms.textarea id="alamat_toko" name="alamat_toko" required="required" placeholder="Masukan Alamat Toko"
            label="Alamat Toko" value="{{ old('alamat_toko', $toko->alamat_toko ?? '') }}"></x-forms.textarea>
    </div>

    <div class="col-lg-4">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
</div>