<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function formRegister() {
        return view('register');
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
        return redirect()->route('login')->with('success', 'Berhasil mendaftar');
    }
}
