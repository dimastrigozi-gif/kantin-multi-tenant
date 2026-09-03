<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Admin' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">
    <main class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="overflow-x-auto rounded-lg bg-white shadow-sm">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Data</th>
                        <th class="px-4 py-3 font-semibold">Status</th>
                        <th class="px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </main>

    @livewireScripts
</body>
</html>