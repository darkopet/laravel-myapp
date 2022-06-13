<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Models\User;


class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {   
        // VALIDATION OF THE REQUEST
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // AUTHENTICATION & LOGIN THE USER attempt
        if (! auth()->attempt($attributes)) {
             // AUTHENTICATION FAILED
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        session()->regenerate();
        // REDIRECT WITH A SUCCESS FLASH MESSAGES
        return redirect('/posts')->with('success', 'Welcome Back!');
       
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Goodbye!');
    }
}