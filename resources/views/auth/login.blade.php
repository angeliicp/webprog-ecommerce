<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Scentify</title>
</head>

<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
          <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="w-8 h-8 mr-2" src="https://img.icons8.com/matisse/100/perfume.png" alt="logo">
            Scentify
          </a>
      
          <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Sign in to your account
              </h1>
      
              <!-- Session Status -->
              @if (session('status'))
                <div class="text-sm text-green-600">
                  {{ session('status') }}
                </div>
              @endif
      
              <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                @csrf
      
                <!-- Email -->
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                  <input type="email" name="email" id="email"
                    value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                     required autofocus>
                  @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </div>
      
                <!-- Password -->
                <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                  <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    required>
                  @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </div>
      
                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="remember_me" class="text-gray-500">Remember me</label>
                    </div>
                  </div>
      
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline">
                      Forgot password?
                    </a>
                  @endif
                </div>
      
                <!-- Submit -->
                <button type="submit"
                  class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                  Sign in
                </button>
      
                <!-- Link ke Register -->
                <p class="text-sm font-light text-gray-500">
                  Don’t have an account yet?
                  <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">Sign up</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
      

</body>
</html>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
