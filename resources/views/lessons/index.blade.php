<x-layout>
    @foreach ($lessons as $lesson)
        <div class="p-4 bg-white rounded-lg shadow mb-4">
            <h2 class="text-xl font-semibold">{{ $lesson->lesson_type }}</h2>
            <p>Trainer Name: {{ $lesson->trainer->name ?? 'N/A' }}</p>
            <span><a href="{{ route('lessons.show', $lesson) }}" class="text-blue-500 hover:underline">Bekijk details</a></span>
            <br>
            <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline bg-transparent border-none p-0 cursor-pointer">Les verwijderen</button>
            </form>
        </div>
    @endforeach
        <div class="mt-4">
        <x-button href="{{ route('lessons.create') }}">Nieuwe les aanmaken</x-button>
    </div>
            <div class="mt-4">
        <x-button variant="danger" href="/trainer/dashboard">Terug</x-button>
    </div>
</x-layout>