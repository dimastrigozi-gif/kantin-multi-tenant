<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Dashboard Tenant' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <aside class="hidden w-64 bg-white p-4 shadow-sm md:block">
            <h2 class="mb-6 text-lg font-bold">
                Kantin
            </h2>

            <nav class="space-y-2">
                <a href="{{ url()->current() }}"
                   class="block rounded-lg px-4 py-3 hover:bg-gray-100">
                    Dashboard
                </a>
            </nav>
        </aside>

        <main class="min-w-0 flex-1 p-4 md:p-6">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>