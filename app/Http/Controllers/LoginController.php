<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect('dashboard');
        }
        else {
            return view('auth.login');
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)) {
            return redirect('dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Login Failed: Your email or password is incorrect');
        }
    }

    public function register() {
        if(Auth::check()) {
            return redirect('dashboard');
        }
        else {
            return view('auth.register');
        }
    }

    public function register_store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if(User::where('email', $request->email)->first()){
            return redirect()->back()->with('error', 'Register Failed: Email is already in use. Please choose another email');
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
            ]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Register Failed: Please try again later');
        }
    }

    public function logout_handler() {
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
