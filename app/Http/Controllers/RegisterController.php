<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'max:255', 'min:7'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        // log user in
        auth()->login($user);

        return redirect('/')->with('success', 'Registration successful!');
        // session('success', 'Registeration successful!');
    }
}
