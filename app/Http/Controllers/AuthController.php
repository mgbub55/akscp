<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginForm(){
        return view('login');
    }

    public function login(Request $data)
    {
        $data->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = collect($data)->only(['email','password']);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            return redirect()->route('dashboard');
        }

        return redirect()->route('loginForm')->with('success', 'Invalid Email Or Password');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');

    }
}
