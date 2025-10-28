@props(['active' => false])

@php
$classes = $active
    ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium'
    : 'text-gray-700 hover:bg-gray-200 hover:text-gray-900 rounded-md px-3 py-2 text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
