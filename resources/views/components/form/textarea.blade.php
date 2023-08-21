<textarea name="{{ $name }}" id="{{ $name }}" class="form-control  @error($name) is-invalid @enderror" {{ $attributes }}>{{ $slot }}</textarea>
@error($name)
    <div class="invalid-feedback form-text">
        {{ $message }}
    </div>
@enderror


{{-- <textarea name="{{ $name }}" id="{{ $name }}" class="form-control  is-invalid " {{ $attributes }}>{{ $slot }}</textarea>
    <div class="invalid-feedback">
        test error
    </div> --}}
