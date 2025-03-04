<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //dd(\request()->all());
        $attributes = request()->validate([
            'first_name' => ['required', 'min: 3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::min(5), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);
        return redirect('/');
    }
}
