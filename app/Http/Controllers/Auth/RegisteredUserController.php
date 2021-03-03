<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'business_name' => $request->business_name,
            'slug' => $this::makeSlugUnique($request->business_name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'package_id' => 1, // freemium package hardcoded by default
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Convert proposed business_name to slug 
     * and make sure it doesn't already exist.
     */
    public static function makeSlugUnique($business_name)
    {
        $proposed_slug = Str::slug($business_name);
        $slug_exists = User::where('slug', '=', $proposed_slug)->exists();
        $slug_appearences = 1;
        while ($slug_exists) {
            $proposed_slug .= '-' . $slug_appearences;
            $slug_exists = User::where('slug', '=', $proposed_slug)->exists();
            $slug_appearences++;
        }
        return $proposed_slug;
    }
}
