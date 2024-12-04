@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary-10 text-start text-base font-medium text-primary-10 bg-primary-50 focus:outline-none focus:text-primary-10 focus:bg-indigo-100 focus:border-primary-10 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-primary-10 hover:bg-primary-50 hover:border-primary-10 focus:outline-none focus:text-gray-800 focus:bg-primary-10 focus:border-primary-10 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
