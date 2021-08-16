<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Register form
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('frontend.auth.register');
        }
    }

    // Register handler
    public function register(RegisterRequest $request)
    {
        if (User::addNewAccount($request)) {
            return redirect()->route('user.login');
        } else {
            return redirect()->back();
        }
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('frontend.auth.login');
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $remember_me = $request->remember_me ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Login failed !!!');
        }
    }

    public function logout()
    {
        if (Auth::logout()) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }
}
