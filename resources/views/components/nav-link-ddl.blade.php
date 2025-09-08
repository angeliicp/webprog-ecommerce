@props(['active' => false, 'isMobile' => false])

<a {{ $attributes }}
    class=" {{ $active ? 'bg-gray-100' : 'text-gray-900 rounded-lg hover:bg-gray-100 group' }} flex items-center p-2 pl-11 group" 
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>