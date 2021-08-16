<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\LoginRequest;

class AdminController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('backend.auth.login');
        }
    }

    public function login(LoginRequest $request)
    {

        $remember = $request->remember ? true : false;

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed !!!');
        }
    }

    public function dashboard()
    {
        $page = 'Dashboard';
        return view('backend.dashboard', compact('page'));
    }

    public function logout()
    {
        if (Auth::guard('admin')->logout()) {
            return redirect()->route('admin.show_login_form');
        } else {
            return redirect()->back();
        }
    }
}
