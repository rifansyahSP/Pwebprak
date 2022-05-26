<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function formLogin() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email atau password salah');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
