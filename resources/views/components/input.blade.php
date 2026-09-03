@props([
    'type' => 'text',
])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500',
    ]) }}
>