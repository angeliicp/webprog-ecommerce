@extends('components.layout')

@section('content')

<section class="bg-white pb-6 antialiased">
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
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Review List</span>
                </div>
            </li>
            </ol>
        </nav>

        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">My reviews</h2>
        
        <div class="mt-6 flow-root sm:mt-8">
          <div class="divide-y divide-gray-200">
            @if ($reviews->isEmpty())
                <div class="col-span-full text-center text-gray-500">
                    <p>No reviews yet</p>
                </div>
            @endif
            @foreach ($reviews as $review)
                <div class="grid md:grid-cols-12 gap-4 md:gap-6 pb-4 md:pb-6">
                    <dl class="md:col-span-3 order-3 md:order-1">
                        <dt class="sr-only">Product:</dt>
                        <dd class="text-base font-semibold text-gray-900">
                        <a href="{{ route('products.show', ['product' => $review->product->prod_id]) }}" class="hover:underline"> {{ $review->product->prod_name }} <span>from {{ $review->user->username }}</span></a>
                        </dd>
                    </dl>
    
                    <dl class="md:col-span-6 order-4 md:order-2">
                        <dt class="sr-only">Message:</dt>
                        <dd class=" text-gray-500">{{ $review->review }}</dd>
                    </dl>
    
                    <div class="md:col-span-3 content-center order-1 md:order-3 flex items-center justify-between">
                        <dl>
                            <dt class="sr-only">Stars:</dt>
                            <dd class="flex items-center space-x-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="{{ $i < floor($review->rating) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
                                @endfor
                            </dd>
                        </dl>
                        <button id="actionsMenuDropdown-{{ $review->rate_id }}" data-dropdown-toggle="dropdownOrder-{{ $review->rate_id }}" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100">
                            <span class="sr-only"> Actions </span>
                            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                            </svg>                    
                        </button>
                        <div id="dropdownOrder-{{ $review->rate_id }}" class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow" data-popper-placement="bottom">
                        <ul class="p-2 text-left text-sm font-medium text-gray-500" aria-labelledby="actionsMenuDropdown-{{ $review->rate_id }}">
                            <li>
                            <button type="button" data-modal-target="editReviewModal-{{ $review->rate_id }}" data-modal-toggle="editReviewModal-{{ $review->rate_id }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>                              
                                <span>Edit review</span>
                            </button>
                            </li>
                            <li>
                                <button type="button" data-modal-target="deleteReviewModal-{{ $review->rate_id }}" data-modal-toggle="deleteReviewModal-{{ $review->rate_id }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100                               <svg class="me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"></path>
                                    </svg>
                                    Delete review
                                </button>
                            </li>
                        </ul>
                        </div> 
                    </div>
                </div>
            @endforeach
          </div>
        </div>
        
      </div>
    </div>
  </section>
  

  @foreach ($reviews as $review)
    <div id="deleteReviewModal-{{ $review->rate_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
                <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="deleteReviewModal-{{ $review->rate_id }}">
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
                    <form action="{{ route('review.destroy', ['review' => $review->rate_id]) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, delete</button>
                    </form>
                    <button data-modal-toggle="deleteReviewModal-{{ $review->rate_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
  @endforeach
  
  @foreach ($reviews as $review)
      
    <div id="editReviewModal-{{ $review->rate_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                    <div>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Add a review for:</h3>
                        <p class="font-medium text-primary-700 hover:underline">{{ $review->product->prod_name }}</p>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="editReviewModal-{{ $review->rate_id }}">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('review.update', ['review' => $review->rate_id]) }}" method="POST" class="p-4 md:p-5 m-0 p-0">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <div class="flex items-center space-x-2">
                                <svg class="h-6 w-6 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <span class="flex items-center space-x-1">
                                    <input type="number" min="1" max="5" step="0.1" id="rating" name="rating" value="{{ $review->rating }}" class="w-20 text-center border-gray-300 rounded-md" />
                                    <span class="font-bold text-gray-900"> / 5</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="review" class="mb-2 block text-sm font-medium text-gray-900">Review description</label>
                            <textarea id="review" name="review" rows="6" class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500">{{ $review->review }}</textarea>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Edit review</button>
                        <button type="button" data-modal-toggle="editReviewModal-{{ $review->rate_id }}" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @endforeach

@endsection