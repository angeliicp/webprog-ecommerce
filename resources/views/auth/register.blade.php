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
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
      <img class="w-8 h-8 mr-2" src="https://img.icons8.com/matisse/100/perfume.png" alt="logo">
      Scentify    
    </a>
    <div class="w-full bg-white rounded-lg shadow sm:max-w-4xl xl:p-0">
      <div class="p-6 space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
          Create an account
        </h1>

        <form class="space-y-6" action="{{ route('register') }}" method="POST">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Section --}}
            <div class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                  <input type="text" name="fname" id="fname" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    placeholder="John" value="{{ old('fname') }}" required>
                  @error('fname')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </div>
                <div>
                  <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                  <input type="text" name="lname" id="lname" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    placeholder="Doe" value="{{ old('lname') }}" required>
                  @error('lname')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <input type="text" name="username" id="username" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                  placeholder="johndoe123" value="{{ old('username') }}" required>
                  @error('username')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                  <input type="email" name="email" id="email" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    placeholder="name@mail.com" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-sm text-red-600 mt-1">{!! $message !!}</p>
                  @enderror
                </div>
                <div>
                  <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
                  <input type="text" name="phone_no" id="phone_no" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    placeholder="+62..." value="{{ old('phone_no') }}" required>
                    @error('phone_no')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                  placeholder="••••••••" required>
                  @error('password')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
              </div>

            </div>

            {{-- Right Section --}}
            <div class="space-y-4">
              <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                <textarea name="address" id="address"
                  class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 resize-none h-[130px]"
                  placeholder="Jl. Sudirman No. 99" value="{{ old('address') }}" required></textarea>
                  @error('address')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                <input type="text" name="country" id="country" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                  placeholder="Indonesia" value="{{ old('country') }}" required>
                  @error('country')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="placeholder-gray-500 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                  placeholder="••••••••" required>
                  @error('password_confirmation')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" name="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required>
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500">I accept the <a class="font-medium text-primary-600 hover:underline" data-modal-target="defaultModal" data-modal-toggle="defaultModal">Terms and Conditions</a></label>
            </div>
          </div>

          <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign up</button>

          <p class="text-sm font-light text-gray-500">
            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Terms & Conditions
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="max-h-[400px] overflow-y-auto pr-2 text-sm text-gray-700 space-y-4">
              <p><strong>1. Acceptance of Terms</strong><br>
              By registering and using this platform, you agree to comply with and be bound by the following terms and conditions. If you do not agree with any part of these terms, please do not proceed with the registration.</p>

              <p><strong>2. User Responsibilities</strong><br>
              You are responsible for maintaining the confidentiality of your login credentials and for all activities that occur under your account. Any misuse or unauthorized use of the system will result in immediate suspension or termination of your access.</p>

              <p><strong>3. Use of Data</strong><br>
              Your data will only be used for internal purposes related to internship management, including but not limited to attendance tracking, task assignments, and performance evaluations. We do not share your personal information with third parties without your consent.</p>

              <p><strong>4. Content Ownership</strong><br>
              All system content, including designs, features, and documents, is owned by the organization and protected by applicable intellectual property laws. You may not copy, reproduce, or redistribute any part of the platform without permission.</p>

              <p><strong>5. Modifications to the System</strong><br>
              The organization reserves the right to modify or discontinue any part of the system at any time without prior notice. Efforts will be made to notify users about major changes that may affect their usage.</p>

              <p><strong>6. Termination</strong><br>
              We reserve the right to suspend or terminate your access to the system at our sole discretion, especially in cases of misuse, policy violation, or security threats.</p>

              <p><strong>7. Governing Law</strong><br>
              These Terms and Conditions are governed by and construed in accordance with the laws applicable in the organization’s operating country.</p>

              <p><strong>8. Contact</strong><br>
              For any questions or concerns about these Terms & Conditions, you may contact our support or HR department.</p>
            </div>

        </div>
    </div>
  </div>

</body>
</html>