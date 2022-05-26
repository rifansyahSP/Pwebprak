<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function formRegister() {
        return view('client.register');
    }

    public function register(Request $request) {
        // Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Store
        User::create([
            'name' => $request->input('name'),
            'type' => 'client',
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect
        return redirect()->route('client.login')->with('success', 'Berhasil mendaftar');
    }

    public function formLogin() {
        return view('client.login');
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
                return redirect()->route('landing');
            } else {
                return redirect()->route('client.login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->route('client.login')->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('landing');
    }
}
