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
                  <a href="{{ route('cart.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Shopping Cart</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Checkout</span>
                </div>
            </li>
            </ol>
        </nav>

        <form action="{{ route('order.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="space-y-8">
              <!-- Billing Info -->
              <div class="border-y border-gray-200 py-6 sm:py-8">
                <h4 class="text-lg font-semibold text-gray-900">Billing & Delivery information</h4>
                <dl class="mt-2">
                  <dt class="text-base font-medium text-gray-900">{{ $user->fname . ' ' . $user->lname }}</dt>
                  <dd class="mt-1 text-base text-gray-500">{{ $user->phone_no }}</dd>
                  <dd class="mt-1 text-base text-gray-500">{{ $user->address }}</dd>
                </dl>
              </div>
          
              <!-- Product Table -->
              <div class="overflow-x-auto border-b border-gray-200">
                <table class="w-full text-left font-medium text-gray-900">
                  <tbody class="divide-y divide-gray-200">
                    @foreach ($cartItems as $index => $item)
                        <tr>
                        <td class="py-4 w-2/3">
                            <div class="flex items-center gap-4">
                            <a href="{{ route('products.show', ['product' => $item->product->prod_id]) }}" class="w-12 h-12 flex-shrink-0">
                                <img class="w-full h-auto" src="{{ asset('storage/' . $item->product->visual_contents->first()->filename) }}" alt="imac image">
                            </a>
                            <a href="{{ route('products.show', ['product' => $item->product->prod_id]) }}" class="hover:underline">{{ $item->product->prod_name }}</a>
                            </div>
                        </td>
                        <td class="p-4 w-1/6 text-base text-gray-900">{{ 'x' . $item->quantity }}</td>
                        <td class="p-4 w-1/6 text-right text-base font-bold text-gray-900">{{ 'Rp ' . number_format($item->product->price, 0, ',', '.') }}</td>
                        </tr>    

                        <!-- Hidden input-->
                        <input type="hidden" name="products[{{ $index }}][id]" value="{{ $item->product->prod_id }}" readonly>
                        <input type="hidden" name="products[{{ $index }}][quantity]" value="{{ $item->quantity }}" readonly>
                        <input type="hidden" name="products[{{ $index }}][price]" value="{{ $item->product->price }}" readonly>
                    @endforeach
                  </tbody>
                </table>
              </div>
          
              <!-- Summary Breakdown -->
              <div class="space-y-4">
                <h4 class="text-xl font-semibold text-gray-900">Order summary</h4>
          
                <div class="space-y-2">
                  <dl class="flex items-center justify-between">
                    <dt class="text-gray-500">Original price</dt>
                    <dd class="text-base font-medium text-gray-900">{{ 'Rp ' . number_format($originalPrice, 0, ',', '.') }}</dd>
                  </dl>
                  <dl class="flex items-center justify-between">
                    <dt class="text-gray-500">Store Pickup</dt>
                    <dd class="text-base font-medium text-gray-900">{{ 'Rp ' . number_format($pickupFee, 0, ',', '.') }}</dd>
                  </dl>
                  <dl class="flex items-center justify-between">
                    <dt class="text-gray-500">Tax</dt>
                    <dd class="text-base font-medium text-gray-900">{{ 'Rp ' . number_format($tax, 0, ',', '.') }}</dd>
                  </dl>
                </div>
          
                <dl class="flex items-center justify-between border-t border-gray-200 pt-2">
                  <dt class="text-lg font-bold text-gray-900">Total</dt>
                  <dd class="text-lg font-bold text-gray-900">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</dd>
                </dl>
              </div>

              <!-- Hidden input -->
              <input type="hidden" name="total_price" value="{{ $total }}" readonly>
          
              <div class="sm:flex sm:items-center gap-4">
                <a href="{{ route('cart.index') }}" class="w-full sm:w-auto text-center rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100">
                  Return to Cart
                </a>
                <button type="submit" class="w-full sm:w-auto mt-4 sm:mt-0 rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                  Send the order
                </button>
              </div>
            </div>
          </form>
      </div>
    </div>

@endsection