@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 text-sm focus:border-primary-50 focus:ring-primary-50 rounded-md shadow-sm']) }}>
