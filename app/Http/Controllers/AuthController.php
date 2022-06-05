<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formLogin() {
        return view('login');
    }

    public function login(Request $request) {
        // Validate
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Check
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                // Login
                Auth::login($user);
                if ($user->type == 'admin') {
                    return redirect()->route('admin');
                } else {
                    return redirect()->route('landing');
                }
            } else {
                return redirect()->route('login')->with('error', 'Password salah, silahkan coba lagi');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email tidak ditemukan, silahkan daftar terlebih dahulu');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('landing');
    }
}
