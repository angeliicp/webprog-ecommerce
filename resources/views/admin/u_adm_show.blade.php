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
              <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="{{ route('adm-users.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">User List</a>
                </div>
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
              <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="{{ route('mod-users.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">User List</a>
                </div>
              </li>
              @endif
            @endauth

            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">User Detail</span>
                </div>
            </li>
            </ol>
        </nav>
  
        <div class="flex items-center justify-between pb-4">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">User Detail</h2>
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
                      @auth
                        @if ($loggedInUser->role === 'Admin')
                          <a data-modal-target="editModal" data-modal-toggle="editModal"
                          class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                          Edit User
                          </a>
                        @elseif ($loggedInUser->role === 'Moderator' && !$user->is_banned)
                          <a data-modal-target="banModal" data-modal-toggle="banModal"
                          class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                          Ban User
                          </a>
                        @elseif ($loggedInUser->role === 'Moderator' && $user->is_banned)
                          <a data-modal-target="unbanModal" data-modal-toggle="unbanModal"
                          class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                          Unban User
                          </a>
                        @endif
                      @endauth

                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </section>
          
        
      </div>
    </div>
</section>

@auth
  @if ($loggedInUser->role === 'Admin')
    <div id="editModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
              <!-- Modal header -->
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                  <h3 class="text-lg font-semibold text-gray-900">
                      Edit user
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="editModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6">
                  <form action="{{ route('adm-users.update', ['adm_user' => $user->user_id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                              <label for="role" class="block mb-2 text-sm font-medium text-gray-900">User Role</label>
                                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full 
                                @error('role') bg-red-50 border border-red-500 text-red-900 placeholder-red-400 text-sm rounded-lg 
                                      focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                    <option disabled selected>--Select User Role--</option>
                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Moderator" {{ $user->role == 'Moderator' ? 'selected' : '' }}>Moderator</option>
                                    <option value="Customer Service" {{ $user->role == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
                                    <option value="Seller" {{ $user->role == 'Seller' ? 'selected' : '' }}>Seller</option>
                                    <option value="Buyer" {{ $user->role == 'Buyer' ? 'selected' : '' }}>Buyer</option>
                                </select>
                                @error('role')
                                  <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                                @enderror
                          </div>  
                          <div class="col-span-6 mb-6">
                              <label for="is_banned" class="block mb-2 text-sm font-medium text-gray-900">User Status</label>
                                <select id="is_banned" name="is_banned" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full 
                                @error('is_banned') bg-red-50 border border-red-500 text-red-900 placeholder-red-400 text-sm rounded-lg 
                                      focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                    <option disabled selected>--Select User Status--</option>
                                    <option value="0" {{ $user->is_banned == '0' ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ $user->is_banned == '1' ? 'selected' : '' }}>Banned</option>
                                </select>
                                @error('is_banned')
                                  <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                                @enderror
                          </div>  
                      </div> 
                      <!-- Modal footer -->
                      <div class="items-center p-5 border-t border-gray-200 rounded-b">
                          <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Submit</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
    </div>
  @elseif ($loggedInUser->role === 'Moderator' && !$user->is_banned)
    <div id="banModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
      <div class="relative h-full w-full max-w-md p-4 md:h-auto">
          <!-- Modal content -->
          <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
              <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="banModal">
                  <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                  <svg class="h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>                  
                  <span class="sr-only">Ban icon</span>
              </div>
              <p class="mb-3.5 text-gray-900">Are you sure you want to ban this user?</p>
              <div class="flex items-center justify-center space-x-4">
                  <form action="{{ route('mod-users.update', ['mod_user' => $user->user_id]) }}" method="POST" class="m-0 p-0">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="is_banned" id="is_banned" value="1">
                      <button type="submit" class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">Yes, ban</button>
                  </form>
                  <button data-modal-toggle="banModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
              </div>
          </div>
      </div>
    </div>
  @elseif ($loggedInUser->role === 'Moderator' && $user->is_banned)
    <div id="unbanModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
      <div class="relative h-full w-full max-w-md p-4 md:h-auto">
          <!-- Modal content -->
          <div class="relative rounded-lg bg-white p-4 text-center shadow sm:p-5">
              <button type="button" class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="unbanModal">
                  <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2">
                  <svg class="h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>                  
                  <span class="sr-only">Ban icon</span>
              </div>
              <p class="mb-3.5 text-gray-900">Are you sure you want to unban this user?</p>
              <div class="flex items-center justify-center space-x-4">
                  <form action="{{ route('mod-users.update', ['mod_user' => $user->user_id]) }}" method="POST" class="m-0 p-0">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="is_banned" id="is_banned" value="0">
                      <button type="submit" class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Yes, unban</button>
                  </form>
                  <button data-modal-toggle="unbanModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
              </div>
          </div>
      </div>
    </div>
  @endif
@endauth





@endsection