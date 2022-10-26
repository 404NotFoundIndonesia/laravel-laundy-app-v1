<div class="mb-3">
    <label 
        for="{{ $name }}" 
        class="form-label">
        {{ $label }}
    </label>
    <select 
        id="{{ $name }}" 
        class="form-select @error($name) is-invalid @enderror" 
        name="{{ $name }}">
        @foreach ($options as $key => $option)
            <option 
                value="{{ $key }}" 
                @selected(old($name, $value) == $key)>
                {{ $option }}
            </option>
        @endforeach
    </select>
    <span 
        class="error invalid-feedback">
        {{ $errors->first($name) }}
    </span>
</div>