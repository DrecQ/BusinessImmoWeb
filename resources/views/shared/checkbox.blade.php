@php 
    $class ??= null;
@endphp


<div @class(["form-check", "form-switch", $class])>
    <input type="hidden" name="{{ $name }}" value="0">
    <input @checked(old($name, $value ?? false)) type="checkbox" name="{{ $name }}" value="1" class="form-input-checkbox @error($name) is-invalid @enderror" role="switch" id="{{ $name }}">

    <label class="form-check-error"  for="{{ $name }}"> {{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

