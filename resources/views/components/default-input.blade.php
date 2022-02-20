<label for="{{ $name }}" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">{{ $label }}</label>
<input name="{{ $name }}" type="{{ $type }}"
    value="{{$value ?? old($name)}}"
    class="form-control validate
        @error($name) 
            is-invalid
        @elseif(old($name)) 
            is-valid 
        @enderror
    "
    aria-describedby="{{ $name }}_feedback" id="{{ $name }}" {{ $attributes }}>

@error($name)
    <div class="invalid-feedback " >
        {{ $message }}
    </div>
@elseif (old($name))
    <div class="invalid-feedback" id="{{ $name }}_feedback">
        Ok!
    </div>
@enderror
