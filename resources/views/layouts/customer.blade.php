<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Kantin' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">
    <main class="mx-auto w-full max-w-md px-4 py-4 sm:max-w-lg lg:max-w-4xl">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>