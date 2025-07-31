<?php

namespace App\Http\Controllers;

use \Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (!auth()->attempt($attributes)) {
            // auth failed.
            throw ValidationException::withMessages(['email' => 'The provided credentials are incorrect.']);
        }

        // session fixation
        session()->regenerate();
        // redirect with a success flash message
        return redirect('/')->with('success', 'You are now logged in');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You have been logged out!');
    }
}
