@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-500 focus:border-black focus:ring-black focus:ring-opacity-50 rounded-md shadow-sm']) !!}>