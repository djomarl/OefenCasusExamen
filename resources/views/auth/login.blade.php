<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <form action="/login" method="POST" class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            @csrf
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Inloggen</h1>

            <x-form-group label="Gebruikersnaam" for="username">
                <x-input name="username" id="username" type="text" placeholder="Voer hier je gebruikersnaam in" />
            </x-form-group>

            <x-form-group label="Wachtwoord" for="password">
                <x-input name="password" id="password" type="password" placeholder="Wachtwoord" />
            </x-form-group>

            <x-button type="submit" variant="primary" class="w-full mt-4">Inloggen</x-button>
        </form>
</body>
</html>