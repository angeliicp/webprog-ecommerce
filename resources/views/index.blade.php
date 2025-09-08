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

<!-- Carousel -->
<div id="default-carousel" class="z-10 relative w-full pb-6" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/hero/hero-1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/hero/hero-2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/hero/hero-3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>

    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>

    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<!-- About -->
<section class="bg-white bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] bg-no-repeat bg-cover bg-center">
    <div class="py-12 px-4 mx-auto max-w-screen-xl text-center lg:py-20">
      <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">About Scentsify</h2>
      <p class="mb-4 text-sm text-gray-600 md:text-base lg:px-48">
        Scentsify started as a small perfume reseller, dedicated to bringing high-quality fragrances to everyone.
        What began as a humble local shop has now grown into a leading online marketplace offering a wide range of brands and scents.
      </p>
      <p class="text-sm text-gray-600 md:text-base lg:px-48">
        We carefully curate our collection to ensure authenticity and satisfaction. Whether you're looking for luxury brands, niche fragrances, or everyday scents, Scentsify is here to help you find the perfect match.
      </p>
    </div>
</section>
  
<!-- Product Gallery -->
<section class="bg-white py-8 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl text-center">Recent Products</h2>
      <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-4">
        
        <!-- Product Card -->
        @foreach ($latest_products as $product)      
        <div class="rounded-lg border border-gray-300 bg-white p-6 shadow-sm">
          <div class="h-56 w-full">
            <a href="#">
              <img class="mx-auto h-full" src="{{ asset('storage/' . $product->visual_contents->first()->filename) }}" alt="" />
            </a>
          </div>
          <div class="pt-4 space-y-2">
            <div class="mb-4 flex items-center justify-between gap-2">
              <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ Str::limit($product->prod_name, 25, '...') }}</a>
              
              <button type="button" data-id="{{ $product->prod_id }}" class="like-btn rounded-lg p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path class="heart-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                </svg>
              </button>
            </div>
  
            <div class="flex items-center gap-1 text-xs text-gray-500">
              <div class="flex items-center gap-0.5 text-yellow-400">
                @for ($i = 0; $i < 5; $i++)
                  <svg class="h-3.5 w-3.5" fill="{{ $i < floor($product->has_rating_avg_rating) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                  </svg>
                @endfor
              </div>
              @if ($product->has_rating_count > 0)
                <span class="text-gray-700 font-medium">
                  {{ number_format($product->has_rating_avg_rating, 1) }}
                </span>
                <span>({{ $product->has_rating_count }})</span>
              @else
                  <span class="text-gray-500 italic">No review yet</span>
              @endif
            </div>
  
            <div>
              <p class="text-lg font-bold text-gray-900">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
            </div>

            <div class="flex items-center justify-between gap-2 mt-3">
              <a type="button" href="{{ route('products.show', ['product' => $product->prod_id]) }}" class="inline-flex items-center rounded-md bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300">
                <svg class="h-4 w-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                  <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                See Detail
              </a>
            
              <form action="{{ route('cart.store', ['cart' => $product->prod_id]) }}" method="POST" class="m-0 p-0">
                @csrf
                @method('POST')
  
                <button type="submit" class="inline-flex items-center rounded-md bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300">
                  <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                  </svg>
                  Add to cart
                </button>
              </form>
            </div>

          </div>
        </div>
        @endforeach

      </div>  
        
      <div class="w-full text-center">
        @auth
        <a href="{{ route('products.index') }}" class="rounded-lg border border-gray-400 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Show more</a>
        @endauth
        @guest
        <a href="{{ route('guest-products.index') }}" class="rounded-lg border border-gray-400 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Show more</a>
        @endguest
      </div>
    </div>
  </section>

  <script>
    function updateLikeButtons() {
        let likedProducts = JSON.parse(localStorage.getItem("likedProducts")) || {};
        const likeButtons = document.querySelectorAll('.like-btn');

        likeButtons.forEach((btn) => {
            const productId = btn.getAttribute("data-id");
            const heartPath = btn.querySelector(".heart-path");

            // Pas halaman load, update tampilan
            if (likedProducts[productId]) {
                heartPath.setAttribute('fill', 'red');
                heartPath.setAttribute('stroke', 'red');
            }

            // Event ketika diklik
            btn.addEventListener("click", function () {
                if (likedProducts[productId]) {
                    // Un-like
                    delete likedProducts[productId];
                    heartPath.setAttribute('fill', 'none');
                    heartPath.setAttribute('stroke', 'currentColor');
                } else {
                    // Like
                    likedProducts[productId] = true;
                    heartPath.setAttribute('fill', 'red');
                    heartPath.setAttribute('stroke', 'red');
                }
                localStorage.setItem("likedProducts", JSON.stringify(likedProducts));
            });
        });
    }

    updateLikeButtons();
  </script>

@endsection