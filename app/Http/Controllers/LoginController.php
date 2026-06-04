<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        // $credentials["activated"] = 1;
        // ini untuk mengecek apakah akun sudah diaktifkan atau belum, karena di database ada field activated yang harus bernilai 1 agar bisa login

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }
        return back()->withErrors([
            "email" => "Email atau password salah",
        ]);
    }

    public function actionLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}
