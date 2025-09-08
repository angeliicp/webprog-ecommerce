@props(['disabled' => false, 'type' => 'submit'])

<button 
    {{ $attributes->merge([
        'type' => $type,
        'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-25 transition'
    ]) }}
    @if ($disabled) disabled @endif
>
    {{ $slot }}
</button>
