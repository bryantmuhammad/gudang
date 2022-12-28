<div class="row">
    <div class="col-lg-12">
        <x-forms.input-group id="nama_kategori" name="nama_kategori" required="required" id="name"
            placeholder="Masukan Nama Kategori" label="Nama Kategori"
            value="{{ old('name', $kategori->nama_kategori ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-4">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
</div>