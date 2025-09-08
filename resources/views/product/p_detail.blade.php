@extends('components.layout')

@section('content')

@if(session('success'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        
        <div class="ms-3 text-sm font-medium">
            <span>Success alert!</span> {{ session('success') }}
        </div>
        
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

<section class="py-6 bg-white md:py-18">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">

      @auth
        @if (Auth::user()->role === 'Admin')
          <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
              <div class="mb-4">
                  <div class="flex items-center justify-between">
                      <div>
                          <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl mb-2">Product Detail</h2>
                          <p class="text-gray-900">This is admin preview of buyer view</p>
                      </div>
                      <div class="sm:flex sm:items-center sm:gap-4">
                        <a href="{{ route('adm-products.show', ['adm_product' => $product->prod_id]) }}" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                          <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                          </svg>                          
                          Admin View
                        </a>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      @endauth

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

            <div class="flex items-center gap-2 mt-2 sm:mt-0">
              <div class="flex items-center gap-1">
                @for ($i = 0; $i < 5; $i++)
                  <svg class="h-3.5 w-3.5 text-yellow-300" fill="{{ $i < floor($avgRating) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                  </svg>
                @endfor
              </div>
              <p class="text-sm font-medium leading-none text-gray-500">{{ $avgRating }}</p>
              <a href="#review-section" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline">
                {{ $totalReviews }} Reviews
              </a>
            </div>
          </div>

          @php
            $isBuyer = Auth::check() && Auth::user()->role === 'Buyer';
          @endphp
          
          <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
            <!-- Add to favorites -->
            <button
              type="button"
              data-id="{{ $product->prod_id }}"
              class="like-btn flex items-center justify-center py-2.5 px-5 text-sm font-medium border rounded-lg focus:outline-none focus:z-10 focus:ring-4
                      bg-white text-gray-900 border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:ring-gray-100
                      {{ $isBuyer ? '' : 'cursor-not-allowed' }}"
              {{ $isBuyer ? '' : 'disabled' }}
            >
              <svg class="w-5 h-5 -ms-2 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path class="heart-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
              </svg>
              Add to favorites
            </button>
          
            <!-- Add to cart -->
            <form action="{{ route('cart.store', ['cart' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
              @csrf
              @method('POST')
              <button
                type="submit"
                class="text-white mt-4 sm:mt-0 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center focus:outline-none focus:ring-4 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300
                  {{ $isBuyer ? '' : 'cursor-not-allowed' }}"
                {{ $isBuyer ? '' : 'disabled' }}
              >
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                </svg>
                Add to cart
              </button>
            </form>
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


                <!-- Product Recommendation -->
            <div class="hidden xl:mt-8 xl:block">
              <h3 class="text-2xl font-semibold text-gray-900">People also bought</h3>
              <div class="mt-6 flex gap-4 overflow-x-auto sm:mt-8">
                @foreach ($recommendations as $reco)
                  <div class="min-w-[200px] space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                    <a href="#" class="overflow-hidden rounded">
                      <img class="mx-auto h-44 w-44" src="{{ asset('storage/' . $reco->visual_contents->first()->filename) }}" alt="{{ $reco->visual_contents->first()->alt_desc }}" />
                    </a>
                    <div>
                      <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ Str::limit($reco->prod_name, 22, '...') }}</a>
                    </div>
                    <div>
                      <p class="text-base font-semibold leading-tight text-gray-900">{{ 'Rp ' . number_format($reco->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="mt-6 items-center gap-2.5">
                      <form action="{{ route('cart.store', ['cart' => $reco->prod_id]) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('POST')
          
                        <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300>
                          <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                          </svg>
                          Add to cart
                        </button>
                      </form>
                      <a type="button" href="{{ route('products.show', ['product' => $reco->prod_id]) }}" class="mt-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">
                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                          <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        See Detail
                      </a>
                    </div>
                  </div>
                @endforeach
</section>

{{-- REVIEW SECTION --}}
<section id="review-section" class="bg-white py-8">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="flex items-center gap-2">
            <h2 class="text-2xl font-semibold leading-none text-gray-900">Reviews</h2>
    
            <div class="mt-2 flex items-center gap-2 sm:mt-0">
            <div class="flex items-center gap-0.5">
              @for ($i = 0; $i < 5; $i++)
                <svg class="h-3.5 w-3.5 text-yellow-300" fill="{{ $i < floor($avgRating) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                  <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>
              @endfor
            </div>
            <p class="text-sm font-medium leading-none text-gray-500">{{ $avgRating }}</p>
            <a href="#review-section" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline"> {{ $totalReviews }} Reviews </a>
            </div>
        </div>
    
        <div class="my-6 gap-8">
            <button type="button" data-modal-target="review-modal" data-modal-toggle="review-modal" class="mb-2 me-2 rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 
              {{ $isBuyer ? '' : 'cursor-not-allowed' }}"
              {{ $isBuyer ? '' : 'disabled' }}>
              Write a review
            </button>        
        </div>
    
        <div class="mt-6 divide-y divide-gray-200">

        <div class="mt-8 space-y-8 divide-y divide-gray-200">
          @foreach ($ratings as $rating)    
          <div class="flex justify-between gap-4 pt-6">
        
            <div class="flex gap-4">
              <img src="{{ asset('storage/' . $rating->user->avatar) }}" alt="{{ $rating->user->avatar_alt }}" class="h-12 w-12 rounded-full object-cover" />
              <div class="flex-1 space-y-2">
                <div class="space-y-0.5">
                  <p class="text-base font-semibold text-gray-900">{{ $rating->user->username }}</p>
                  <p class="text-sm text-gray-500">{{ $rating->created_at->format('F d Y \a\t H:i') }}</p>
                </div>
                <div class="flex items-center gap-0.5">
                  @for ($i = 0; $i < floor($rating->rating); $i++)
                    <svg class="h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                  @endfor
                  <p class="text-sm text-gray-500">({{ $rating->rating }})</p>
                </div>
                <p class="text-base text-gray-900">{{ $rating->review }}</p>
              </div>
            </div>
        
            <!-- Action Button -->
            @if ($loggedInUser->role === 'Admin')
              <div class="flex items-start pt-4 gap-2">
                @if (!$rating->is_banned)
                  <button data-modal-target="banReviewModal-{{ $rating->rate_id }}" data-modal-toggle="banReviewModal-{{ $rating->rate_id }}"
                    class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                    Ban Review
                  </button>
                  <a href="{{ route('adm-users.show', ['adm_user' => $rating->user->user_id]) }}" 
                    class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                    Ban User
                  </a>
                @else
                  <button data-modal-target="banReviewModal-{{ $rating->rate_id }}" data-modal-toggle="banReviewModal-{{ $rating->rate_id }}"
                    class="rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                    Unban Review
                  </button>
                @endif
                <button data-modal-target="delReviewModal-{{ $rating->rate_id }}" data-modal-toggle="delReviewModal-{{ $rating->rate_id }}"
                  class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                  Delete Review
                </button>
              </div>
            @elseif ($loggedInUser->role === 'Moderator')
              <div class="flex items-start pt-4 gap-2">
                @if (!$rating->is_banned)
                  <button data-modal-target="banReviewModal-{{ $rating->rate_id }}" data-modal-toggle="banReviewModal-{{ $rating->rate_id }}"
                    class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                    Ban Review
                  </button>
                  <a href="{{ route('mod-users.show', ['mod_user' => $rating->user->user_id]) }}" 
                    class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                    Ban User
                  </a>
                @else
                  <button data-modal-target="banReviewModal-{{ $rating->rate_id }}" data-modal-toggle="banReviewModal-{{ $rating->rate_id }}"
                    class="rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                    Unban Review
                  </button>
                @endif
                <button data-modal-target="delReviewModal-{{ $rating->rate_id }}" data-modal-toggle="delReviewModal-{{ $rating->rate_id }}"
                  class="rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                  Delete Review
                </button>
              </div>
            @endif
          </div>
        
          <!-- Ban Review Modal -->
          <div id="banReviewModal-{{ $rating->rate_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
                    <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="banReviewModal-{{ $rating->rate_id }}">
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    @if ($rating->is_banned)
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                            </svg>                            
                            <span class="sr-only">Unban icon</span>
                        </div>
                        <p class="mb-3.5 text-gray-900">Are you sure you want to unban this review?</p>
        
                        <div class="flex items-center justify-center space-x-4">
                            @if ($loggedInUser->role === 'Admin')
                                <form action="{{ route('adm-review.ban', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_banned" id="is_banned" value="0">
                                    <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, unban</button>
                                </form>
                            @elseif ($loggedInUser->role === 'Moderator')
                                <form action="{{ route('mod-review.ban', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_banned" id="is_banned" value="0">
                                    <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, unban</button>
                                </form>
                            @endif
                            <button data-modal-toggle="banReviewModal-{{ $rating->rate_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                        </div>
                    @else
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">                
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>                            
                            <span class="sr-only">Ban icon</span>
                        </div>
                        <p class="mb-3.5 text-gray-900">Are you sure you want to ban this review?</p>
        
                        <div class="flex items-center justify-center space-x-4">
                            @if ($loggedInUser->role === 'Admin')
                                <form action="{{ route('adm-review.ban', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_banned" id="is_banned" value="1">
                                    <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, ban</button>
                                </form>
                            @elseif ($loggedInUser->role === 'Moderator')
                                <form action="{{ route('mod-review.ban', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_banned" id="is_banned" value="1">
                                    <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, ban</button>
                                </form>
                            @endif
                            <button data-modal-toggle="banReviewModal-{{ $rating->rate_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                        </div>
                    @endif
                </div>
            </div>
          </div>

          <!-- Delete Review -->
          <div id="delReviewModal-{{ $rating->rate_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
                    <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="delReviewModal-{{ $rating->rate_id }}">
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                        <svg class="h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                        <span class="sr-only">Danger icon</span>
                    </div>
                    <p class="mb-3.5 text-gray-900">Are you sure you want to delete this review?</p>
                    <p class="mb-4 text-gray-500">This action cannot be undone.</p>
                    <div class="flex items-center justify-center space-x-4">
                      @if ($loggedInUser->role === 'Admin')
                        <form action="{{ route('adm-review.destroy', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Delete</button>
                        </form>
                      @elseif ($loggedInUser->role === 'Moderator')
                        <form action="{{ route('mod-review.destroy', ['id' => $rating->rate_id]) }}" method="POST" class="m-0 p-0">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Delete</button>
                        </form>
                      @endif
                      <button data-modal-toggle="delReviewModal-{{ $rating->rate_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
        </div>
  </section>
  
  
  <!-- Add review modal -->
  <div id="review-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
    <div class="relative max-h-full w-full max-w-2xl p-4">
      <!-- Modal content -->
      <div class="relative rounded-lg bg-white shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
          <div>
            <h3 class="mb-1 text-lg font-semibold text-gray-900">Add a review for:</h3>
            <p class="font-medium text-primary-700 hover:underline">{{ $product->prod_name }}</p>
          </div>
          <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="review-modal">
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <form action="{{ route('review.store') }}" method="POST" class="p-4 md:p-5">
          @csrf
          @method('POST')
          <div class="mb-4 grid grid-cols-2 gap-4">
            <input type="hidden" name="user_id" value="2" readonly>
            <input type="hidden" name="prod_id" value="{{ $product->prod_id }}" readonly>
            <div class="col-span-2">
              {{-- <label for="rating" class="mb-2 block text-sm font-medium text-gray-900">Product Rate</label> --}}
              <div class="flex items-center space-x-2">
                <svg class="h-6 w-6 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <span class="flex items-center space-x-1">
                    <input type="number" min="1" max="5" step="0.1" id="rating" name="rating" class="w-16 text-center border-gray-300 rounded-md" />
                    <span class="font-bold text-gray-900"> / 5</span>
                </span>
              </div>
            </div>
            <div class="col-span-2">
              <label for="review" class="mb-2 block text-sm font-medium text-gray-900">Review description</label>
              <textarea id="review" name="review" rows="6" class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"></textarea>
            </div>
          </div>
          <div class="border-t border-gray-200 pt-4 md:pt-5">
            <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Add review</button>
            <button type="button" data-modal-toggle="review-modal" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
      function updateLikeButtons() {
        let likedProducts = JSON.parse(localStorage.getItem("likedProducts")) || {}
        const likeButtons = document.querySelectorAll('.like-btn')

        likeButtons.forEach((btn) => {
            const productId = btn.getAttribute("data-id")
            const heartPath = btn.querySelector(".heart-path")

            // Pas halaman load, update tampilan
            if (likedProducts[productId]) {
                heartPath.setAttribute('fill', 'red')
                heartPath.setAttribute('stroke', 'red')
            }

            // Event ketika diklik
            btn.addEventListener("click", function () {
                if (likedProducts[productId]) {
                    // Un-like
                    delete likedProducts[productId]
                    heartPath.setAttribute('fill', 'none')
                    heartPath.setAttribute('stroke', 'currentColor')
                } else {
                    // Like
                    likedProducts[productId] = true
                    heartPath.setAttribute('fill', 'red')
                    heartPath.setAttribute('stroke', 'red')
                }
                localStorage.setItem("likedProducts", JSON.stringify(likedProducts))
            });
        });
    }

    updateLikeButtons()
  </script>

@endsection