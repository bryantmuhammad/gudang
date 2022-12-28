<div class="form-group">
    <label for="{{ $id }}">{{ __($label) }}</label>
    <input class="form-control @error($name) is-invalid @enderror" type="{{ $type ?? 'text' }}" id={{ $id }}
        placeholder="{{ $placeholder ?? 'Input Data' }}" value="{{ $value ?? '' }}" name="{{ $name ?? '' }}"
        {{ $required ?? '' }}>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
