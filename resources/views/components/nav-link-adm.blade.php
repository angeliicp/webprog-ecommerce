@props(['active' => false, 'isMobile' => false])

<a {{ $attributes }}
    class=" {{ $active ? 'bg-gray-100' : 'text-gray-900 rounded-lg hover:bg-gray-100 group' }} flex items-center p-2 group" 
    aria-current="{{ $active ? 'page' : false }}"
    aria-controls="dropdown-adm" data-collapse-toggle="dropdown-adm">{{ $slot }}</a>