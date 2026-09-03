@props([
    'type' => 'button',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700',
    ]) }}
>
    {{ $slot }}
</button>