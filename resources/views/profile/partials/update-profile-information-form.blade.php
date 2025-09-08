<section>
  <h2 class="text-lg font-medium text-gray-900 mb-1">
    {{ __('Profile Information') }}
  </h2>
  <p class="text-sm text-gray-600 mb-6">
    {{ __("Update your account's profile information and email address.") }}
  </p>

  {{-- Verification form (tetap ada) --}}
  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  {{-- Update form --}}
  <form method="POST" action="{{ route('profile.update', ['profile' => $loggedInUser->user_id]) }}" enctype="multipart/form-data" class="space-y-12">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      {{-- Left Section --}}
      <div class="space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
            <input type="text" name="fname" id="fname"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="John" value="{{ old('fname', $user->fname) }}" required>
            @error('fname')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
            <input type="text" name="lname" id="lname"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Doe" value="{{ old('lname', $user->lname) }}" required>
            @error('lname')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div>
          <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
          <input type="text" name="username" id="username"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
            placeholder="johndoe123" value="{{ old('username', $user->username) }}" required>
          @error('username')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="name@mail.com" value="{{ old('email', $user->email) }}" required>
            @error('email')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
              <p class="text-sm mt-2 text-gray-800">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification"
                        class="underline text-sm text-blue-600 hover:text-blue-800 font-medium focus:outline-none">
                  {{ __('Click here to re-send the verification email.') }}
                </button>
              </p>
              @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                  {{ __('A new verification link has been sent to your email address.') }}
                </p>
              @endif
            @endif
          </div>

          <div>
            <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
            <input type="text" name="phone_no" id="phone_no"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="+62..." value="{{ old('phone_no', $user->phone_no) }}" required>
            @error('phone_no')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
            <textarea name="address" id="address" rows="4"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 resize-none"
                placeholder="Jl. Sudirman No. 99">{{ old('address', $user->address) }}</textarea>
            @error('address')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
            <input type="text" name="country" id="country"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="Indonesia" value="{{ old('country', $user->country) }}">
            @error('country')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      {{-- Right Section --}}
      <div class="space-y-4">
        {{-- Avatar Upload --}}
        <div>
          <span class="block mb-2 text-sm font-medium text-gray-900">Profile Picture</span>
          <div class="relative p-2 bg-gray-100 rounded-lg w-36 h-36 mb-4 overflow-hidden">
            <img id="avatar-preview"
                 src="{{ $user->avatar ? asset('storage/' . $user->avatar) :                           
                          '<svg class="absolute w-28 h-28 text-gray-400 -left-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                          </svg>' }}"
                 alt="{{ $user->avatar_alt }}"
                 class="object-cover w-full h-full rounded-md">
          </div>
          <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900">Upload file</label>
          <label for="avatar"
            class="cursor-pointer flex w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 gap-2">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
            </svg>
            Choose File
          </label>
          <input id="avatar" name="avatar" type="file" class="hidden" accept="image/*" onchange="previewFile(this)">
          <p class="mt-1 text-sm text-gray-500">PNG, JPG, JPEG or WEBP</p>

          <div class="my-4">
            <label for="avatar_alt" class="block mb-2 text-sm font-medium text-gray-900">Alt Description</label>
            <textarea id="avatar_alt" name="avatar_alt" rows="2"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
              required>{{ old('avatar_alt', $user->avatar_alt) }}</textarea>
            @error('avatar_alt')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>
    </div>

    {{-- Submit --}}
    <div class="pt-4">
      <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Save Changes
      </button>

      @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
          class="text-sm text-gray-600 ml-4">
          {{ __('Saved.') }}
        </p>
      @endif
    </div>
  </form>
</section>

{{-- Preview Script --}}
<script>
  function previewFile(input) {
    const preview = document.getElementById('avatar-preview');
    const file = input.files[0];
    if (file) {
      preview.src = URL.createObjectURL(file);
    }
  }
</script>
