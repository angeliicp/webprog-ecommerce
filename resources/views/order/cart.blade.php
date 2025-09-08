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
@elseif (session('info'))
  <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50" role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    
    <div class="ms-3 text-sm font-medium">
        <span>Info alert!</span> {{ session('info') }}
    </div>
    
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
  </div>
@elseif (session('error'))
  <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    
    <div class="ms-3 text-sm font-medium">
        <span>Danger alert!</span> {{ session('error') }}
    </div>
    
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
  </div>
@endif

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
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Shopping Cart</span>
                </div>
            </li>
            </ol>
        </nav>

        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shopping Cart</h2>
    
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-8 xl:gap-12">
          <div class="w-full lg:w-2/3 space-y-6">
            <div class="space-y-6">
              @if ($cartItems->isEmpty())
                <div class="col-span-full text-center text-gray-500">
                  <p>No products yet</p>
                </div>
              @endif
              @foreach ($cartItems as $item)
                <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                  <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                    <a href="{{ route('products.show', ['product' => $item->prod_id]) }}" class="shrink-0 md:order-1">
                      <img class="h-20 w-20" src="{{ asset('storage/' . $item->product->visual_contents->first()->filename) }}" alt="{{ $item->product->visual_contents->first()->alt_desc }}" />
                    </a>
      
                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                      <div class="flex items-center">
                        <button type="button" data-cartid="{{ $item->cart_id }}" class="button-decrement inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                          <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                          </svg>
                        </button>
                        <input type="text" id="counter-input-{{ $item->cart_id }}" 
                          class="qty-input w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0" 
                          value="{{ $item->quantity }}" data-price="{{ $item->product->price }}" required />
                        <button type="button" data-cartid="{{ $item->cart_id }}" class="button-increment inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                          <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                          </svg>
                        </button>
                      </div>
                      <div class="text-end md:order-4 md:w-32">
                        <p class="text-base font-bold text-gray-900">{{ 'Rp ' . number_format($item->product->price, 0, ',', '.') }}</p>
                      </div>
                    </div>
      
                    <div class="w-full min-w-0 flex flex-col space-y-2 md:order-2 md:max-w-md">
                      <a href="{{ route('products.show', ['product' => $item->prod_id]) }}" class="text-base font-medium text-gray-900 hover:underline">
                        {{ $item->product->prod_name }}
                      </a>
                    
                      <button data-modal-target="delProd-{{ $item->cart_id }}" data-modal-toggle="delProd-{{ $item->cart_id }}" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                        <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        Remove
                      </button>
                    </div>                    
                  </div>
                </div>
              @endforeach
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
                
              </div>
            </div>
          </div>
    
          <!-- Order Summary-->
          <div class="w-full lg:w-1/3 space-y-6 mt-6 lg:mt-0">
            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
              <p class="text-xl font-semibold text-gray-900">Order summary</p>
    
              <div class="space-y-4">
                <div class="space-y-2">
                  <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">Original price</dt>
                    <dd id="original-price" class="text-base font-medium text-gray-900">

                    </dd>
                  </dl>
    
                  <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">Store Pickup</dt>
                    <dd class="text-base font-medium text-gray-900">Rp 9.000</dd>
                  </dl>
    
                  <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">Tax</dt>
                    <dd id="tax-amount" class="text-base font-medium text-gray-900">
                    </dd>
                  </dl>
                </div>
    
                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2"> 
                  <dt class="text-base font-bold text-gray-900">Total</dt>
                  <dd id="total-amount" class="text-base font-bold text-gray-900">
                  </dd>
                </dl>
              </div>
    
              <a href="{{ route('order.create') }}" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Proceed to Checkout</a>
    
              <div class="flex items-center justify-center gap-2">
                <span class="text-sm font-normal text-gray-500"> or </span>
                <a href="{{ route('products.index') }}" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline">
                  Continue Shopping
                  <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                  </svg>
                </a>
              </div>
            </div>
    
            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
              <form class="space-y-4">
                <div>
                  <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900"> Do you have a voucher or gift card? </label>
                  <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" placeholder="" required />
                </div>
                <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Apply Code</button>
              </form>
            </div>
          </div>
        </div>

        
      </div>
    </div>
</section>

<!-- Delete Modal -->
@foreach ($cartItems as $item)
    <div id="delProd-{{ $item->cart_id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
                <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="delProd-{{ $item->cart_id }}">
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
                    <form action="{{ route('cart.destroy', ['cart' => $item->cart_id]) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, delete</button>
                    </form>
                    <button data-modal-toggle="delProd-{{ $item->cart_id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


<script>
  function updateCartQuantity(cartId, newQty) {
      fetch(`/cart/${cartId}`, {
          method: 'PUT',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({ quantity: newQty })
      })
      .then(response => response.json())
      .then(data => {
          console.log(data.message)
      });
  }
  
  document.querySelectorAll('.button-increment').forEach(btn => {
      btn.addEventListener('click', function () {
          const cartId = this.dataset.cartid
          const input = document.getElementById('counter-input-' + cartId)
          let qty = parseInt(input.value) || 1
          qty++
          input.value = qty
          updateCartQuantity(cartId, qty)
          updateOrderSummary()
      });
  });
  
  document.querySelectorAll('.button-decrement').forEach(btn => {
      btn.addEventListener('click', function () {
          const cartId = this.dataset.cartid;
          const input = document.getElementById('counter-input-' + cartId)
          let qty = parseInt(input.value) || 1
          if (qty > 1) {
              qty--
              input.value = qty
              updateCartQuantity(cartId, qty)
              updateOrderSummary()
          }
      })
  })

  updateOrderSummary()

  function updateOrderSummary() {
    let originalPrice = 0
    const pickupFee = 9000

    document.querySelectorAll('.qty-input').forEach(input => {
        const qty = parseInt(input.value) || 0
        const price = parseInt(input.dataset.price) || 0
        originalPrice += qty * price;
    });

    const tax = originalPrice * 0.10
    const total = originalPrice + pickupFee + tax

    document.getElementById('original-price').textContent = 'Rp ' + originalPrice.toLocaleString('id-ID')
    document.getElementById('tax-amount').textContent = 'Rp ' + tax.toLocaleString('id-ID')
    document.getElementById('total-amount').textContent = 'Rp ' + total.toLocaleString('id-ID')
  }

</script>
  

@endsection