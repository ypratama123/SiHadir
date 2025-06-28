@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-poppins font-semibold text-lg text-gray-100 drop-shadow-sm']) }}>
    {{ $value ?? $slot }}
</label>
