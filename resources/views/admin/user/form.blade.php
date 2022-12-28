<div class="row">
    <div class="col-lg-6">
        <x-forms.input-group id="name" name="name" required="required" id="name" placeholder="Masukan Nama Anda"
            label="Nama" value="{{ old('name', $user->name ?? '') }}">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6">
        <x-forms.input-group id="email" name="email" required="required" id="email" placeholder="Masukan Email Anda"
            label="Email" type="email" value="{{ old('email', $user->email ?? '') }}">
        </x-forms.input-group>
    </div>

    @if ($type == 'type')
    <div class="col-lg-6">
        <x-forms.input-group id="password" name="password" required="required" id="password"
            placeholder="Masukan Password Anda" label="Password" type="password" value="{{ $user->password ?? '' }}">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6">
        <x-forms.input-group id="password_confirmation" name="password_confirmation" required="required"
            id="password_confirmation" placeholder="Konfirmasi Password Anda" label="Konfirmasi Password"
            type="password" value="{{ $user->password ?? '' }}">
        </x-forms.input-group>
    </div>
    @endif

    @if ($type == 'create')
    <div class="col-lg-6">
        <x-forms.input-group id="password" name="password" required="required" id="password"
            placeholder="Masukan Password Anda" label="Password" type="password" value="{{ $user->password ?? '' }}">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6">
        <x-forms.input-group id="password_confirmation" name="password_confirmation" required="required"
            id="password_confirmation" placeholder="Konfirmasi Password Anda" label="Konfirmasi Password"
            type="password" value="{{ $user->password ?? '' }}">
        </x-forms.input-group>
    </div>
    @endif

    <div class="col-lg-12">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
            <option value="">- Pilih Role -</option>
            <option value="1" {{ old('role', $user->role ?? '') == 1 ? 'selected' : '' }}>Karyawan</option>
            <option value="2" {{ old('role', $user->role ?? '') == 2 ? 'selected' : '' }}>Owner</option>
        </select>
        @error('role')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    @if ($type == 'edit')
    <div class="col-lg-12">
        <hr>
        <p style="color:red;font-size:12px;">* Abaikan jika tidak ingin mengganti password</p>
    </div>
    <div class="col-lg-6">
        <x-forms.input-group id="password" name="password" id="password" placeholder="Masukan Password Anda"
            label="Password" type="password">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6">
        <x-forms.input-group id="password_confirmation" name="password_confirmation" id="password_confirmation"
            placeholder="Konfirmasi Password Anda" label="Konfirmasi Password" type="password">
        </x-forms.input-group>
    </div>
    @endif


    <div class="col-lg-4 mt-4">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>
</div>