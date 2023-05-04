<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    // Store New User and log in
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        // Create User
        $user = User::create($formFields);
        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();
        // invalidate session
        $request->session()->invalidate();
        // regenerate token
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    // Log user in
    public function login(){
        return view('users.login');
    }

    // authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
