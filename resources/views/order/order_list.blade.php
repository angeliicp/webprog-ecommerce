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
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Order List</span>
                </div>
            </li>
            </ol>
        </nav>

        <section class="bg-white py-8 antialiased">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              <div class="mx-auto max-w-5xl">
                <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                  <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">My orders</h2>
          
                  <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                    <div>
                      <label for="order-type" class="sr-only mb-2 block text-sm font-medium text-gray-900">Select order type</label>
                      <select id="order-type" class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500">
                        <option selected>All orders</option>
                        <option value="shipped">Shipped</option>
                        <option value="completed">Completed</option>
                        <option value="refund">Refund</option>
                        <option value="cancelled">Cancelled</option>
                      </select>
                    </div>
          
                  </div>
                </div>
          
                <div class="mt-6 flow-root sm:mt-8">
                  <div class="divide-y divide-gray-200">
                    @if ($orders->isEmpty())
                        <div class="col-span-full text-center text-gray-500">
                            <p>No orders yet</p>
                        </div>
                    @endif
                    @foreach ($orders as $order)
                    <div class="flex flex-wrap items-center gap-y-4 py-6">
                      <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-500">Product(s):</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900">
                          <a href="{{ route('order.show', ['order' => $order->order_id]) }}" class="hover:underline">
                            @php
                            $productNames = $order->products->pluck('prod_name')->toArray();
                            $productList = implode(', ', $productNames);
                            @endphp
                            <span title="{{ $productList }}">{{ \Illuminate\Support\Str::limit($productList, 40, '...') }}</span>
                          </a>
                        </dd>
                      </dl>
          
                      <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-500">Date:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</dd>
                      </dl>
          
                      <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-500">Price:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900">{{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</dd>
                      </dl>
          
                      <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-500">Status:</dt>
                        @if ($order->status === 'pending')
                            <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800">
                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                                </svg>
                                Pending
                            </dd>
                        @elseif ($order->status === 'shipped')
                            <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">
                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                </svg>
                                Shipped
                            </dd>
                        @elseif ($order->status === 'completed')
                            <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                Completed
                            </dd>
                        @elseif ($order->status === 'refund')
                            <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-pink-100 px-2.5 py-0.5 text-xs font-medium text-pink-800">
                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>                                  
                                Refund
                            </dd>
                        @elseif ($order->status === 'cancelled')
                            <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">
                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                                Cancelled
                            </dd>
                        @endif
                      </dl>
          
                      <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                        <button type="button" class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 lg:w-auto">Cancel order</button>
                        <a href="{{ route('order.show', ['order' => $order->order_id]) }}" class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 lg:w-auto">View details</a>
                      </div>
                    </div>
                    @endforeach         
                  </div>
                </div>
          
            
              </div>
            </div>
          </section>

      </div>
    </div>

@endsection