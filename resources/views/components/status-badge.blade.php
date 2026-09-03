@props([
    'status' => 'default',
])

<span
    {{ $attributes->merge([
        'class' => 'inline-flex rounded-full px-3 py-1 text-xs font-semibold ' .
            ($status === 'success'
                ? 'bg-green-100 text-green-700'
                : ($status === 'warning'
                    ? 'bg-yellow-100 text-yellow-700'
                    : ($status === 'danger'
                        ? 'bg-red-100 text-red-700'
                        : 'bg-gray-100 text-gray-700'))),
    ]) }}
>
    {{ $slot }}
</span>