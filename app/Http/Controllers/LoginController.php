<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email_username' => ['required'],
            'password' => ['required'],
        ]);

        $email_username = strtolower($request->email_username);
        $user = User::with('jabatan')->where('email', $email_username)->orWhere('username', $email_username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('service.menu')->with('success', 'Login Berhasil, Selamat bekerja '.$user->nama_lengkap);
        } else {
            return back()->with('error', 'Harap periksa kembali email/username dan password anda.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with("success", "Logout Berhasil, sampai jumpa kembali.");
    }
}
