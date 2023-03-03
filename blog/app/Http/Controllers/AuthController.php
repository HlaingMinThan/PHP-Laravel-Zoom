<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function loginStore()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return  redirect()->intended(route('home'))->with('success', 'welcome back');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('register.create');
    }

    public function registerStore()
    {
        $cleanData = request()->validate([
            'name' => 'required',
            'username' => ['required', 'max:8'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ], [
            'email.required' => 'We need to know your email address!',
            'email.email' => 'Your email is not a valid email address!',
        ]);

        $user = new User();
        $user->name = $cleanData['name'];
        $user->username = $cleanData['username'];
        $user->email = $cleanData['email'];
        $user->password = $cleanData['password'];
        $user->save();

        auth()->login($user); //store in the session
        return redirect('/')->with('success', 'Welcome Back');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
