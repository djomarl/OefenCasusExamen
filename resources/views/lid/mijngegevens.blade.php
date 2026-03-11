<x-layout>
    <h1 class="text-3xl">Mijn Gegevens</h1>
    <p>Hier kun je je persoonlijke gegevens bekijken en aanpassen.</p>

    <div class="max-w-md mx-auto mt-8 space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
            <input type="text" value="{{ auth()->user()->name }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gebruikersnaam</label>
            <input type="text" value="{{ auth()->user()->username }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
            <input type="text" value="{{ auth()->user()->role }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Abonnement</label>
            <input type="text" value="{{ auth()->user()->activeSubscription ? auth()->user()->activeSubscription->subscription_type : 'Geen actief abonnement' }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Startdatum abonnement</label>
            <input type="text" value="{{ auth()->user()->activeSubscription ? auth()->user()->activeSubscription->start_date->format('d-m-Y') : 'N/A' }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Einddatum abonnement</label>
            <input type="text" value="{{ auth()->user()->activeSubscription ? auth()->user()->activeSubscription->end_date->format('d-m-Y') : 'N/A' }}" readonly class="w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 shadow-sm focus:outline-none" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gespaarde punten</label>
            <span class="text-gray-900">{{ auth()->user()->points }}</span>
        </div>
    </div>

</x-layout>