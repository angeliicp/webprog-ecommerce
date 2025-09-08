@extends('components.layout')

@section('content')

<section class="bg-white py-6 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        
        <!-- Breadcrumb -->
        <nav class="flex py-3 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Product Detail</span>
                </div>
            </li>
            </ol>
        </nav>
  
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl mb-2">Product Detail</h2>
                <p class="mb-6 text-gray-900">This is admin view</p>
            </div>
            <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                <a href="{{ route('adm-products.edit', ['adm_product' => $product->prod_id]) }}" class="like-btn flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                  <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                  </svg>                  
                  Edit
                </a>
                <a href="{{ route('adm-products.buyerView', ['id' => $product->prod_id]) }}" class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center">
                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    Buyer View
                </a>
              </div>
        </div>

        <section class="py-4 bg-white md:py-16">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
              <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                  <img class="w-full" src="{{ asset('storage/' . $product->visual_contents->first()->filename) }}" alt="{{ $product->visual_contents->first()->alt_desc }}" />
                </div>
        
                <div class="mt-6 sm:mt-8 lg:mt-0">
                  <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                    {{ $product->prod_name }}
                  </h1>
                  <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                        {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}
                    </p>
                  </div>
        
                  <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <button type="button" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                      <svg class="w-5 h-5 -ms-2 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path class="heart-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                      </svg>
                      Add to favorites
                    </button>
                    <button type="button" class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                        </svg>
                        Add to cart
                    </button>
                  </div>
        
                  <hr class="my-6 md:my-8 border-gray-200" />
        
                  <p class="mb-6 text-gray-900">{{ $product->description }}</p>
        
                  <p class="text-gray-900"><span class="font-bold">Concentration: </span>{{ $product->concentration }}</p>
                  <p class="text-gray-900"><span class="font-bold">Top Notes: </span>{{ $product->top_notes }}</p>
                  <p class="text-gray-900"><span class="font-bold">Mid Notes: </span>{{ $product->mid_notes }}</p>
                  <p class="text-gray-900"><span class="font-bold">Base Notes: </span>{{ $product->base_notes }}</p>
                  <p class="text-gray-900"><span class="font-bold">Fragrance Gender: </span>{{ $product->fragrance_gender }}</p>
                  <p class="text-gray-900"><span class="font-bold">Age Group: </span>{{ $product->age_group }}</p>
                </div>
              </div>
            </div>
        </section>

      </div>
    </div>
</section>
