<div class="row">

    <div class="col-lg-6">
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori')is-invalid @enderror">
            <option value="">- Pilih Kategori -</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}"
                    {{ old('id_kategori', $produk->id_kategori ?? '') == $kategori->id_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
        @error('id_kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-lg-6">
        <x-forms.input-group id="nama_produk" name="nama_produk" required="required" placeholder="Masukan Nama Produk"
            label="Nama Produk" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-6">
        <x-forms.input-group id="berat" name="berat" required="required" type="number"
            placeholder="Masukan Berat Produk" label="Berat Produk" value="{{ old('berat', $produk->berat ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-6">
        <x-forms.input-group id="harga" name="harga" required="required" type="number"
            placeholder="Masukan Harga Produk" label="Harga Produk" value="{{ old('harga', $produk->harga ?? '') }}">
        </x-forms.input-group>
    </div>

    <div class="col-lg-12">
        <x-forms.textarea id="keterangan" name="keterangan" required="required" placeholder="Masukan Keterangan Produk"
            label="Keterangan" value="{{ old('keterangan', $produk->keterangan ?? '') }}"></x-forms.textarea>
    </div>

    <div class="col-lg-6">
        <label for="gambar">Foto Produk</label>
        <input type="file" class="form-control @error('gambar') is-invalid @enderror" onchange="previewImage()"
            name="gambar" id="gambar">
        @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>



    <div class="col-lg-12 mt-3 mb-4">
        <label for="preview">Preview Foto Produk</label>
        <br>
        @if (isset($produk))
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Preview Image" class="img-preview img-fluid"
                style="width:150px;height:130px;">
        @else
            <img src="" alt="Preview Image" class="img-preview img-fluid" style="width:150px;height:130px;">
        @endif
    </div>

    <div class="col-lg-4">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
</div>

@push('scripts')
    <script>
        function previewImage() {
            const image = document.getElementById("gambar");
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = "block";
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
@endpush
