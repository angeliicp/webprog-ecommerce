@extends('components.layout')

@section('content')

<section class="bg-white py-6 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        
        <!-- Breadcrumb -->
        <nav class="flex py-3 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            @auth
                @if ($loggedInUser->role === 'Admin')
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                @elseif ($loggedInUser->role === 'Moderator')
                    <li class="inline-flex items-center">
                        <a href="{{ route('moderator.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                @endif
            @endauth
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Product List</span>
                </div>
            </li>
            </ol>
        </nav>
  
        @auth
            @if ($loggedInUser->role === 'Admin')
                <div class="flex items-center justify-between pb-4">
                    <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Product List</h2>
                    <a href="{{ route('adm-products.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        + Add Product
                    </a>
                </div>
            @endif
        @endauth
        

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age Group
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keyword
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->prod_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->age_group }}
                            </td>
                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->keyword }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->is_listed)
                                    <button data-modal-target="listProd-{{ $product->prod_id }}" data-modal-toggle="listProd-{{ $product->prod_id }}" class="font-medium text-red-600 hover:underline">
                                        <svg class="w-5 h-5 text-gray-500 hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </button>                                  
                                @else
                                    <button data-modal-target="listProd-{{ $product->prod_id }}" data-modal-toggle="listProd-{{ $product->prod_id }}" class="font-medium text-red-600 hover:underline">
                                        <svg class="w-5 h-5 text-gray-500 hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </button>                                  
                                @endif
                            </td>
                            <td class="text-center space-x-2">
                                @if ($loggedInUser->role === 'Admin')
                                    <a href="{{ route('adm-products.show', ['adm_product' => $product->prod_id]) }}" class="font-medium text-gray-600 hover:underline">
                                        Detail
                                    </a>
                                    <a href="{{ route('adm-products.edit', ['adm_product' => $product->prod_id]) }}" class="font-medium text-blue-600 hover:underline">
                                        Edit
                                    </a>
                                    <button data-modal-target="delProd-{{ $product->prod_id }}" data-modal-toggle="delProd-{{ $product->prod_id }}" class="font-medium text-red-600 hover:underline">
                                        Delete
                                    </button>
                                @elseif ($loggedInUser->role === 'Moderator')
                                    <a href="{{ route('mod-products.show', ['mod_product' => $product->prod_id]) }}" class="font-medium text-gray-600 hover:underline">
                                        Detail
                                    </a>
                                @endif
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>
    </div>
</section>

<!-- Visibility/Listing Modal -->
@foreach ($products as $product)
<div id="listProd-{{ $product->prod_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
    <div class="relative h-full w-full max-w-md p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
            <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="listProd-{{ $product->prod_id }}">
                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            @if ($product->is_listed)
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="sr-only">Unlist icon</span>
                </div>
                <p class="mb-3.5 text-gray-900">Are you sure you want to unlist this product?</p>

                <div class="flex items-center justify-center space-x-4">
                    @if ($loggedInUser->role === 'Admin')
                        <form action="{{ route('adm-products.listing', ['id' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_listed" id="is_listed" value="0">
                            <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, unlist</button>
                        </form>
                    @elseif ($loggedInUser->role === 'Moderator')
                        <form action="{{ route('mod-products.listing', ['id' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_listed" id="is_listed" value="0">
                            <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, unlist</button>
                        </form>
                    @endif

                    <button data-modal-toggle="listProd-{{ $product->prod_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>

            @else
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">                
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="sr-only">List icon</span>
                </div>
                <p class="mb-3.5 text-gray-900">Are you sure you want to list this product?</p>

                <div class="flex items-center justify-center space-x-4">
                    @if ($loggedInUser->role === 'Admin')
                        <form action="{{ route('adm-products.listing', ['id' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_listed" id="is_listed" value="1">
                            <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, list</button>
                        </form>
                    @elseif ($loggedInUser->role === 'Moderator')
                        <form action="{{ route('mod-products.listing', ['id' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_listed" id="is_listed" value="1">
                            <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, list</button>
                        </form>
                    @endif

                    <button data-modal-toggle="listProd-{{ $product->prod_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            @endif
        </div>
    </div>
  </div>
@endforeach

<!-- Delete Modal -->
@foreach ($products as $product)
    <div id="delProd-{{ $product->prod_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
                <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="delProd-{{ $product->prod_id }}">
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                    <svg class="h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                    <span class="sr-only">Danger icon</span>
                </div>
                <p class="mb-3.5 text-gray-900">Are you sure you want to delete this product?</p>
                <p class="mb-4 text-gray-500">This action cannot be undone.</p>
                <div class="flex items-center justify-center space-x-4">
                    <form action="{{ route('adm-products.destroy', ['adm_product' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, delete</button>
                    </form>
                    <button data-modal-toggle="delProd-{{ $product->prod_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function previewFile(input) {
        const file = input.files[0];
        const previewImg = document.getElementById('image-preview');
        const previewName = document.getElementById('filename-preview');

        if (file) {
            // Tampilkan nama file
            previewName.textContent = file.name;

            // Preview gambar
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            previewName.textContent = '';
        }
    }
</script>


@endsection
