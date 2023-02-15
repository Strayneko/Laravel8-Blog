<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{


    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // validate input 
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attemp to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($attributes)) {

            // avoid session fixation by regenerate new session id
            session()->regenerate();

            return redirect()->to('/db/posts')->with('success', 'Welcome back!');
        }

        // auth failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified!']);
    }

    public function destroy()
    {
        // logout user
        auth()->logout();

        return redirect()->to('/db/posts')->with('success', 'Goodbye!');
    }
}
