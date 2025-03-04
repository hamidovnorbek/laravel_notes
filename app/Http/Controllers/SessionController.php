<?php

namespace App\Http\Controllers;

//use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
           'email' => ['required', 'email'],
           'password' => ['required', Password::min(6)]
        ]);

        if(Auth::attempt($attributes)){
            request()->session()->regenerate();
            return redirect('/jobs');
        }

        return back()->withErrors([

            'email' => 'The provided credentials do not match our records.',

        ])->onlyInput('email');

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
