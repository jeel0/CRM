@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-gray-800']) }}>
    {{ $value ?? $slot }}
</label>