@extends('components.layout')

@section('content')

<section class="bg-white pb-6 antialiased">
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
              @elseif ($loggedInUser->role === 'Buyer')
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">User Profile</span>
                </div>
            </li>
            </ol>
        </nav>
  
        <div class="flex items-center justify-between pb-4">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">User Profile</h2>
        </div>

        <section class="bg-white py-8 antialiased">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              <div class="mx-auto max-w-5xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          
                  <!-- Sidebar - Profile Picture & Basic Info -->
                  <div class="md:col-span-1 border rounded-lg p-6">
                    <div class="flex flex-col items-center text-center">
                      <div class="relative w-24 h-24 overflow-hidden bg-gray-100 rounded-full mb-4">
                        @if ($user->avatar)
                          <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->avatar_alt }}" class="w-full h-full object-cover">
                        @else
                          <svg class="absolute w-28 h-28 text-gray-400 -left-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                          </svg>
                        @endif
                      </div>
                      <h3 class="text-lg font-semibold text-gray-900">{{ $user->fname }} {{ $user->lname }}</h3>
                      <p class="text-sm text-gray-500 mb-4">{{ '@' . $user->username }}</p>
                      <ul class="text-sm text-gray-700 space-y-2 text-left w-full">
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Phone:</strong> {{ $user->phone_no }}</li>
                        <li>
                            <strong>Account Status:</strong>
                            @if ($user->is_banned)
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-lg">
                                  🚫 Banned
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-lg">
                                  ✅ Active
                                </span>
                            @endif
                        </li>
                      </ul>
                    </div>
                  </div>
          
                  <!-- Detail Info -->
                  <div class="md:col-span-2 space-y-6">
          
                    <!-- User Detail Fields -->
                    <div class="p-6 border rounded-lg">
                      <h4 class="text-md font-semibold mb-4 text-gray-800">User Details</h4>
                      <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                          <p class="text-sm text-gray-500">First Name</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->fname }}</p>
                        </div>
                        <div>
                          <p class="text-sm text-gray-500">Last Name</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->lname }}</p>
                        </div>
                        <div>
                          <p class="text-sm text-gray-500">Username</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->username }}</p>
                        </div>
                        <div>
                          <p class="text-sm text-gray-500">Email</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->email }}</p>
                        </div>
                        <div>
                          <p class="text-sm text-gray-500">Phone Number</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->phone_no }}</p>
                        </div>
                        <div>
                          <p class="text-sm text-gray-500">Role</p>
                          <p class="text-base font-medium text-gray-900">{{ ucfirst($user->role) }}</p>
                        </div>
                        <div class="sm:col-span-2">
                          <p class="text-sm text-gray-500">Address</p>
                          <p class="text-base font-medium text-gray-900 whitespace-pre-line">{{ $user->address }}</p>
                        </div>
                        <div class="sm:col-span-2">
                          <p class="text-sm text-gray-500">Country</p>
                          <p class="text-base font-medium text-gray-900">{{ $user->country }}</p>
                        </div>  
                      </div>
                    </div>
          
                    <!-- Action Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('profile.edit', ['profile' => $loggedInUser->user_id]) }}"
                          class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                          Edit Profile
                        </a>
                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>
    </div>
</section>


@endsection