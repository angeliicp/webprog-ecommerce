@extends('components.layout')

@section('content')

<section class="bg-white py-6 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">

        <!-- Breadcrumb -->
        <nav class="flex py-3 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('home.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="{{ route('adm-products.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Product List</a>
                </div>
              </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Edit Product</span>
                </div>
            </li>
            </ol>
        </nav>

        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl mb-6">Edit Product</h2>

        <form action="{{ route('adm-products.update', ['adm_product' => $product->prod_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="prod_name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                    <input type="text" name="prod_name" id="prod_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    value="{{ $product->prod_name }}" required>
                </div>
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    value="{{ $product->price }}" required>
                </div>

                <div class="grid gap-4 sm:col-span-2 md:gap-6 sm:grid-cols-3">
                    <div>
                        <label for="top_notes" class="block mb-2 text-sm font-medium text-gray-900">Top Notes</label>
                        <input type="text" name="top_notes" id="top_notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                        value="{{ $product->top_notes }}" required>
                    </div>
                    <div>
                        <label for="mid_notes" class="block mb-2 text-sm font-medium text-gray-900">Mid Notes</label>
                        <input type="text" name="mid_notes" id="mid_notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                        value="{{ $product->mid_notes }}" required>
                    </div>
                    <div>
                        <label for="base_notes" class="block mb-2 text-sm font-medium text-gray-900">Base Notes</label>
                        <input type="text" name="base_notes" id="base_notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                        value="{{ $product->base_notes }}" required>
                    </div>
                </div>

                <div class="grid gap-4 sm:col-span-2 md:gap-6 sm:grid-cols-4">
                    <div>
                        <label for="concentration" class="block mb-2 text-sm font-medium text-gray-900">Concentration</label>
                        <select id="concentration" name="concentration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option disabled selected>Select category</option>
                            <option value="EDC" @selected($product->concentration == 'EDC')>EDC (Eau de Cologne)</option>
                            <option value="EDT" @selected($product->concentration == 'EDT')>EDT (Eau de Toilette)</option>
                            <option value="EDP" @selected($product->concentration == 'EDP')>EDP (Eau de Parfum)</option>
                            <option value="Parfum" @selected($product->concentration == 'Parfum')>Parfum</option>
                        </select>
                    </div>
                    <div>
                        <label for="fragrance_gender" class="block mb-2 text-sm font-medium text-gray-900">Fragrance Gender</label>
                        <select id="fragrance_gender" name="fragrance_gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option disabled selected>Select category</option>
                            <option value="Unisex" @selected($product->fragrance_gender == 'Unisex')>Unisex</option>
                            <option value="Men" @selected($product->fragrance_gender == 'Men')>Men</option>
                            <option value="Women" @selected($product->fragrance_gender == 'Women')>Women</option>
                        </select>
                    </div>
                    <div>
                        <label for="age_group" class="block mb-2 text-sm font-medium text-gray-900">Age Group</label>
                        <input type="text" name="age_group" id="age_group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                         value="{{ $product->age_group }}" required>
                    </div>
                    <div>
                        <label for="keyword" class="block mb-2 text-sm font-medium text-gray-900">Keyword</label>
                        <input type="text" name="keyword" id="keyword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                        value="{{ $product->keyword }}"required>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" required>{{ $product->description }}</textarea>
                </div>
            </div>
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900">Product Image</span>
                
                    <!-- Image preview -->
                    <div class="relative p-2 bg-gray-100 rounded-lg sm:w-36 sm:h-36 mb-4 overflow-hidden">
                        <img id="image-preview" 
                             src="{{ asset('storage/' . $product->visual_contents->first()->filename) }}" 
                             alt="{{ $product->visual_contents->first()->alt_desc }}"
                             class="object-cover w-full h-full rounded-md">
                    </div>

                <label for="filename" class="block mb-2 text-sm font-medium text-gray-900">Upload file</label>
                <div>
                    <label for="filename" class="cursor-pointer flex w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 gap-2">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
                          </svg>
                        Choose File
                    </label>
                    <span id="filename-preview" class="text-sm text-gray-600 truncate"></span>
                </div>
                <input id="filename" name="filename" type="file" class="hidden" onchange="previewFile(this)">
                <p class="mt-1 text-sm text-gray-500" id="filename_help">PNG, JPG, JPEG or WEBP</p>
            </div>            
            <div class="my-4">
                <label for="alt_desc" class="block mb-2 text-sm font-medium text-gray-900">Alt Description</label>
                <textarea id="alt_desc" name="alt_desc" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" required>{{ $product->visual_contents->first()->alt_desc }}</textarea>
            </div>

            <div class="items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button type="submit" class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit product</button>
            </div>
        </form>

      </div>
    </div>
</section>

<script>
    function previewFile(input) {
        const file = input.files[0];
        const previewImg = document.getElementById('image-preview');
        const previewName = document.getElementById('filename-preview');

        if (file) {
            previewName.textContent = file.name;

            // Img Preview
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
