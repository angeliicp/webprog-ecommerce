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
                @elseif ($loggedInUser->role === 'Moderator')
                    <li class="inline-flex items-center">
                        <a href="{{ route('moderator.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">User List</span>
                </div>
            </li>
            </ol>
        </nav>
  
        <div class="flex items-center justify-between pb-4">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">User List</h2>
        </div> 

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 border border-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                <th scope="col" class="px-6 py-3">User</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <!-- User Row -->
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->avatar_alt }}" />
                            <div class="font-medium text-gray-900">
                                <div>{{ $user->fname . ' ' . $user->lname }}</div>
                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gray-800 text-xs font-medium py-0.5">{{ $user->role }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->is_banned)
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Banned</span>                            
                            @else
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Active</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex items-center space-x-2">
                            @auth
                                @if ($loggedInUser->role === 'Admin')
                                    <a href="{{ route('adm-users.show', ['adm_user' => $user->user_id]) }}" class="text-blue-600 hover:underline text-sm font-medium">Detail</a>
                                @elseif ($loggedInUser->role === 'Moderator')
                                    <a href="{{ route('mod-users.show', ['mod_user' => $user->user_id]) }}" class="text-blue-600 hover:underline text-sm font-medium">Detail</a>
                                    
                                @endif
                            @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>

      </div>
    </div>
</section> 


@endsection