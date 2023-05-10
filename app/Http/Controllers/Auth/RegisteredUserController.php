<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate(
            [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'language' => ['string', 'max:6'],
                'theme'    => ['string', 'max:24'],
                'is_admin' => ['boolean'],
            ]
        );

        if (User::exists()) {
            $admin = 0;
        } else {
            $admin = 1;
        }

        $user = User::create(
            [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'language' => 'en',
                'theme'    => 'light',
                'is_admin' => $admin,
            ]
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {

        return view('auth.register');
    }

}
