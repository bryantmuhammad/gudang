<div class="form-group">
    <label for="{{ $id }}">{{ __($label) }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" id={{ $id }}
        placeholder="{{ $placeholder ?? 'Input Data' }}" name="{{ $name ?? '' }}" {{ $required ?? '' }} cols="30"
        rows="10">{{ $value ?? '' }}</textarea>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
