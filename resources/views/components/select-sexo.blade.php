@props(['name' => 'sexo', 'selected' => null])
<select name="{{ $name }}" id="{{ $name }}" {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full']) !!}>
    <option value="F" {{ $selected == 'F' ? 'selected' : '' }}>Femenino</option>
    <option value="M" {{ $selected == 'M' ? 'selected' : '' }}>Masculino</option>
</select>
