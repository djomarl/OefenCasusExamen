<x-layout>
    <form action="{{route('lessons.store')}}" method="POST" class="max-w-md mx-auto mt-8">
        @csrf
        <x-form-group label="Les type:" for="lesson_type">
            <x-input type="text" id="lesson_type" name="lesson_type" required />
        </x-form-group>

        <div class="flex items-center justify-between">
            <x-button type="submit">Les aanmaken</x-button>
        </div>
    </form>
</x-layout>