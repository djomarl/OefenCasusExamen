@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-slate-900 placeholder:text-slate-400 bg-white px-3 py-2 border transition-colors ease-in-out duration-200']) !!}>
