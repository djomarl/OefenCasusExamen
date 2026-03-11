<x-layout>
    @if (!auth()->user()->activeSubscription)
        <div class="flex flex-col md:flex-row gap-6 justify-center mt-6">
            <div class="bg-white rounded-lg shadow-md p-6 w-full md:w-1/2 flex flex-col items-center">
                <h2 class="text-xl font-bold mb-2">Maandelijks abonnement</h2>
                <p class="mb-4 text-gray-600">€10 per maand</p>
                <form action="{{ route('subscriptions.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="subscription_type" value="Maand">
                    <input type="hidden" name="start_date" value="{{ now()->toDateString() }}">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Aanschaffen</button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 w-full md:w-1/2 flex flex-col items-center">
                <h2 class="text-xl font-bold mb-2">Jaarlijks abonnement</h2>
                <p class="mb-4 text-gray-600">€100 per jaar</p>
                <form action="{{ route('subscriptions.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="subscription_type" value="Jaar">
                    <input type="hidden" name="start_date" value="{{ now()->toDateString() }}">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Aanschaffen</button>
                </form>
            </div>
        </div>
        @else
        <h1 class="text-3xl">Gebruiker Dashboard</h1>
        <p>Welkom op je dashboard! Hier kun je je abonnement beheren en je punten bekijken.</p>
        <div class="mt-4">
            <p>Opgespaarde punten: {{auth()->user()->points}}</p> 
        </div>
        <div class="mt-4">
            <form action="{{ route('check-ins.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="check_in_time" value="{{ now() }}">
                <input type="hidden" name="checked_in" value="1">
                <x-button type="submit">Check In</x-button>
            </form>
        </div>
    @endif
</x-layout>