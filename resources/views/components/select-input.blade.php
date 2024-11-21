<div>
    <label for="{{ $name }}">{{ ucfirst(str_replace('_', ' ', $name)) }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        @foreach ($items as $key => $value)
            <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>
