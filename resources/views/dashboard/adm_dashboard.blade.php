@extends('components.layout')

@section('content')

<div class="px-4 py-6 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
    <div class="w-full mb-1">
      <h4 class="mb-2 text-3xl font-bold text-gray-900">Hi, Welcome {{ $loggedInUser->fname . ' ' . $loggedInUser->lname }}</h4>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        <!-- Total User Accounts -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="items-center text-gray-500">
                <svg class="w-6 h-6 text-gray-500 mb-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                </svg>
                <span class="text-base font-medium">Total Users</span>
            </div>
            <h5 class="text-2xl font-bold text-gray-900">{{ $usersTotal }}</h5>
        </div>

        <!-- Total Customers -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="items-center text-gray-500">
                <svg class="w-6 h-6 text-gray-500 mb-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                </svg>   
                <span class="text-base font-medium">Total Customers</span>
            </div>
            <h5 class="text-2xl font-bold text-gray-900">{{ $custTotal }}</h5>
        </div>
    
        <!-- Total Sold Products -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="items-center text-gray-500">
                <svg class="w-6 h-6 text-gray-500 mb-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>                  
                <span class="text-base font-medium">Sold Products</span>
            </div>
            <h5 class="text-2xl font-bold text-gray-900"></h5>
        </div>
    
        <!-- Total Refunds -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="items-center text-gray-500">
                <svg class="w-6 h-6 text-gray-500 mb-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd"/>
                    <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>                           
                <span class="text-base font-medium">Total Refunds</span>
            </div>
            <h5 class="text-2xl font-bold text-gray-900"></h5>
        </div>
    
      </div>

      
    </div>
</div>

@endsection