<nav class="bg-white border border-gray-300 fixed top-0 inset-x-0 z-40">
  <div class="max-w-screen-xl mx-auto px-4 py-3 flex items-center justify-between">
    
    <!-- Left: Hamburger + Logo -->
    <div class="flex items-center space-x-3 rtl:space-x-reverse">
      <button type="button" class="text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2" data-collapse-toggle="mobile-menu">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <span class="sr-only">Open menu</span>
      </button>
      <a href="{{ route('home.index') }}" class="flex items-center space-x-2">
        <img src="https://img.icons8.com/matisse/100/perfume.png" class="h-12" alt="Scentify Logo" />
        <span class="text-2xl font-semibold">Scentify</span>
      </a>
    </div>

    <!-- Center: Search -->
    @auth
      @if ($loggedInUser->role === 'Buyer')
        <div class="hidden md:flex w-1/2 justify-center">
          <form action="{{ route('search') }}" method="POST" id="search-form" class="relative w-full max-w-md m-0 p-0">   
            @csrf
            @method('POST')
            <label for="product-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="product-search" name="product-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search products by name, keyword, or date..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
          </form>
        </div>
      @endif
    @endauth

    @guest
        <div class="hidden md:flex w-1/2 justify-center">
          <form action="{{ route('guest-search') }}" method="POST" id="search-form" class="relative w-full max-w-md m-0 p-0">   
            @csrf
            @method('POST')
            <label for="product-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="product-search" name="product-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search products by name, keyword, or date..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
          </form>
        </div>
    @endguest

    <!-- Right: Auth / Profile -->
    <div class="flex items-center space-x-2">

      <!-- Search icon for mobile -->
      <button class="md:hidden text-gray-500 hover:bg-gray-100 p-2 rounded-lg" data-collapse-toggle="mobile-search">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </button>

      @if (Auth::check())
        <!-- IF LOGGED IN -->
        <div class="relative md:flex" id="profile-menu">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button" data-dropdown-toggle="user-dropdown">
            @if ($loggedInUser->avatar)
              <img src="{{ asset('storage/' . $loggedInUser->avatar) }}" alt="{{ $loggedInUser->avatar_alt }}" class="w-8 h-8 rounded-full">
            @else
              <svg class="w-8 h-8 rounded-full text-gray-400 bg-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
              </svg>
            @endif
          </button>
          <div class="z-60 hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900">{{ $loggedInUser->username }}</span>
              <span class="block text-sm text-gray-500 truncate">{{ $loggedInUser->email }}</span>
            </div>
            <ul class="py-2">
              <li><a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">User Profile</a></li>
              <li>
                <form action="{{ route('logout') }}" method="post" class="block px-4 py-2 text-sm hover:bg-gray-100" id="logout-form">
                  @csrf
                  @method('POST')
                  <button type="submit" class="text-gray-700" role="menuitem">
                    Log Out
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      @else
        <!-- IF LOGGED OUT -->
        <div class="md:flex items-center space-x-2" id="auth-buttons">
          <a href="{{ route('login') }}" class="px-4 py-2 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50">Sign in</a>
          <a href="{{ route('register') }}" class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Sign up</a>
        </div>
      @endif

    </div>
  </div>

  <!-- Mobile search input -->
  @auth
    @if (Auth::user()->role === 'Buyer')
      <div class="hidden px-4 py-2 md:hidden" id="mobile-search">
        <form class="relative w-full max-w-md">   
          <label for="product-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
          <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
              </div>
              <input type="search" id="product-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search products..." required />
              <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
          </div>
        </form>
      </div>
    @endif
  @endauth

  <!-- Hamburger menu navigation menu -->
  <div class="hidden px-4 py-2" id="mobile-menu">
    <ul class="flex flex-col space-y-2">
      @auth
        @if ($loggedInUser->role === 'Admin')
          <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-800">Home</a></li>

          <li>
            <x-nav-link-adm>
              <p class="block px-4 py-2 text-sm text-gray-800">Admin Tools</p>
              <svg class="w-3 h-3 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </x-nav-link-adm>
            <ul id="dropdown-adm" class="hidden py-2 space-y-2">
              <li>
                <x-nav-link-ddl href="{{ route('adm-users.index') }}" :active="request()->is('adm-users')">
                  <p class="block px-4 py-2 text-sm text-gray-800">User Management</p>
                </x-nav-link-ddl>
              </li>
              <li>
                <x-nav-link-ddl href="{{ route('adm-products.index') }}" :active="request()->is('adm-products')">
                  <p class="block px-4 py-2 text-sm text-gray-800">Product Management</p>
                </x-nav-link-ddl>
              </li>
              <li>
                <x-nav-link-ddl href="" :active="request()->is('adm-products')">
                  <p class="block px-4 py-2 text-sm text-gray-800">Order List</p>
                </x-nav-link-ddl>
              </li>
            </ul>
          </li>
        @elseif ($loggedInUser->role === 'Moderator')
          <li><a href="{{ route('moderator.dashboard') }}" class="block px-4 py-2 text-sm text-gray-800">Home</a></li>
          <li><a href="{{ route('mod-users.index') }}" class="block px-4 py-2 text-sm text-gray-800">User Management</a></li>
          <li><a href="{{ route('mod-products.index') }}" class="block px-4 py-2 text-sm text-gray-800">Product Management</a></li>

        @elseif ($loggedInUser->role === 'Customer Service')
        @elseif ($loggedInUser->role === 'Buyer')
          <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-800">Home</a></li>
          <li><a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-gray-800">Product List</a></li>
          <li><a href="{{ route('cart.index') }}" class="block px-4 py-2 text-sm text-gray-800">Cart</a></li>
          <li><a href="{{ route('order.index') }}" class="block px-4 py-2 text-sm text-gray-800">Order</a></li>

          <li>
            <x-nav-link-acc>
              <p class="block px-4 py-2 text-sm text-gray-800">Account</p>
              <svg class="w-3 h-3 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </x-nav-link-acc>
            <ul id="dropdown-acc" class="hidden py-2 space-y-2">
              <li>
                <x-nav-link-ddl href="" :active="request()->is('')">
                  <p class="block px-4 py-2 text-sm text-gray-800">My Account</p>
                </x-nav-link-ddl>
              </li>
              <li>
                <x-nav-link-ddl href="{{ route('review.index') }}" :active="request()->is('review')">
                  <p class="block px-4 py-2 text-sm text-gray-800">My reviews</p>
                </x-nav-link-ddl>
              </li>
            </ul>
          </li>
        @endif
      @endauth
{{-- 
      <li><a href="{{ route('home.index') }}" class="block px-4 py-2 text-sm text-gray-800">Home</a></li>
      <li><a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-gray-800">Product List</a></li>
      <li><a href="{{ route('cart.index') }}" class="block px-4 py-2 text-sm text-gray-800">Cart</a></li>
      
      <li>
        <x-nav-link-acc>
          <p class="block px-4 py-2 text-sm text-gray-800">Account</p>
          <svg class="w-3 h-3 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
         </svg>
        </x-nav-link-acc>
        <ul id="dropdown-acc" class="hidden py-2 space-y-2">
          <li>
            <x-nav-link-ddl href="" :active="request()->is('')">
              <p class="block px-4 py-2 text-sm text-gray-800">My Account</p>
            </x-nav-link-ddl>
          </li>
          <li>
            <x-nav-link-ddl href="{{ route('order.index') }}" :active="request()->is('order')">
              <p class="block px-4 py-2 text-sm text-gray-800">My orders</p>
            </x-nav-link-ddl>
          </li>
          <li>
            <x-nav-link-ddl href="{{ route('review.index') }}" :active="request()->is('review')">
              <p class="block px-4 py-2 text-sm text-gray-800">My reviews</p>
            </x-nav-link-ddl>
          </li>
        </ul>
      </li>
       --}}
    </ul>
  </div>
</nav>
