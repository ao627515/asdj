<input class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
    {{ $attributes }}>
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

{{-- <input class="form-control is-invalid " name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
    {{ $attributes }}>

    <div class="invalid-feedback">
        Test error
    </div> --}}

