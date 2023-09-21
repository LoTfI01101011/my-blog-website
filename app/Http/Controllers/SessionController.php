<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create () 
    {
        return view('sessions.create');
    }

    public function store () 
    {
        $attributes =  request()->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);

        if(Auth()->attempt($attributes))
        {
            session()->regenerate();

            return redirect('/')->with('success' , 'Welcome !');
        }

        throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified']);
        // return back()
        // ->withInput()
        // ->withErrors(['email' => 'Your provided credentials could not be verified']); //$errors

    }

    public function destroy () 
    {
        auth()->logout();

        return redirect('/')->with('success' , 'Goodbye !');
    }
}
