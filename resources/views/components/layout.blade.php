<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Examen App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <x-navbar />

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

   
</body>