@php 
    $class ??= null;
@endphp

<div @class(["form-check", "form-switch", $class])>
    <input type="hidden" name="{{ $name }}" value="0">
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        value="1" 
        class="form-check-input @error($name) is-invalid @enderror" 
        id="{{ $name }}" 
        role="switch"
        @checked(old($name, isset($value) ? $value : false))>

    <label class="form-check-label" for="{{ $name }}"> {{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
