<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // validate input
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);
        // store validated data into database
        $user = User::create($attributes);

        // log the created user in
        auth()->login($user);
        return redirect()->to('/db/posts')->with('success', 'Account successfully created!');
    }
}
