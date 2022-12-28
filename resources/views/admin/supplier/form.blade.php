<div class="row">
    <div class="col-lg-6">
        <x-forms.input-group id="nama_supplier" name="nama_supplier" required="required"
            placeholder="Masukan Nama Supplier" label="Nama Supplier"
            value="{{ old('nama_supplier', $supplier->nama_supplier ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-6">
        <x-forms.input-group id="no_telepon_supplier" name="no_telepon_supplier" required="required"
            placeholder="Masukan No Telepon Supplier" label="No Telepon Supplier"
            value="{{ old('no_telepon_supplier', $supplier->no_telepon_supplier ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-12">
        <x-forms.textarea id="alamat_supplier" name="alamat_supplier" required="required"
            placeholder="Masukan Alamat Supplier" label="Alamat Supplier"
            value="{{ old('alamat_supplier', $supplier->alamat_supplier ?? '') }}"></x-forms.textarea>
    </div>

    <div class="col-lg-4">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
</div>