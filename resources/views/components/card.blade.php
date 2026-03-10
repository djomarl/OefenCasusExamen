@props(['title' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200 transition-shadow hover:shadow-md duration-300']) }}>
    
    @if($title || isset($header))
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/50">
            @if($title)
                <h3 class="text-lg leading-6 font-medium text-slate-900">
                    {{ $title }}
                </h3>
            @else
                {{ $header }}
            @endif
        </div>
    @endif

    <div class="p-6 text-slate-900">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
            {{ $footer }}
        </div>
    @endif
</div>
