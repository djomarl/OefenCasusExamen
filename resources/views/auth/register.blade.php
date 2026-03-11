<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreren</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <form action="/register" method="POST" class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            @csrf
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Registreren</h1>

            <x-form-group label="Naam" for="name">
                <x-input name="name" id="name" type="text" placeholder="Je volledige naam" />
            </x-form-group>

            <x-form-group label="Gebruikersnaam" for="username">
                <x-input name="username" id="username" type="text" placeholder="Kies een unieke username" />
            </x-form-group>

            <x-form-group label="Wachtwoord" for="password">
                <x-input name="password" id="password" type="password" placeholder="Wachtwoord" />
            </x-form-group>

            <x-form-group label="Rol" for="role">
                <select name="role" id="role" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-slate-900 placeholder:text-slate-400 bg-white px-3 py-2 border transition-colors ease-in-out duration-200">
                    <option value="Lid">Lid</option>
                    <option value="Balie">Balie</option>
                    <option value="Trainer">Trainer</option>
                    <option value="Beheerder">Beheerder</option>
                </select>
            </x-form-group>

            <x-button type="submit" variant="primary" class="w-full mt-4">Account Aanmaken</x-button>
        </form>
</body>
</html>