<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:50', 'regex:/^\w+$/', function ($attribute, $value, $fail) {
                                if (User::whereRaw('LOWER(username) = ?', [Str::lower($value)])->exists()) {
                                    $fail('The username has already been taken.');
                                }
                            }],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', function ($attribute, $value, $fail) {
                            if (User::where('email', $value)->exists()) {
                                $fail('The email has already been takenn. <a href="'.route('password.request').'" class="text-blue-600 underline">Forget password?</a>');
                            }
                        }],
            'phone_no'  => ['required', 'string', 'max:20'],
            'address'   => ['required', 'string'],
            'country'   => ['required', 'string', 'max:100'],
            'terms'     => ['accepted'],
            'password'  => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',      
                'regex:/[0-9]/',      
                'regex:/[@$!%*#?&]/', 
            ],
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => Str::lower($request->username),
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'country' => $request->country,
            'role' => 'Buyer',
            'password'  => Hash::make($request->password),
            'email_verified' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
