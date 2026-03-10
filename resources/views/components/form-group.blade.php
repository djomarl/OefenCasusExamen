@props(['label' => null, 'for' => null, 'error' => null])

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if ($label)
        <x-label :for="$for" :value="$label" />
    @endif
    
    {{ $slot }}

    @if ($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
