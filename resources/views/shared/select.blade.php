@php

    $class ??=null;
    $name ??= '';
    $value ??= null;
    $label ??= ucfirst($name);

@endphp



<div @class(["form-groupe", $class])>
    <label for="{{ $name }}"> {{ $label }}</label>

    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach( $option as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}"> {{ $v }} </option>
        @endforeach
    </select>

    @error($name)

        <div class="invalid-feedback">
            {{ $message }}
        </div>
     
    @enderror
</div>