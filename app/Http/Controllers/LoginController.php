<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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

            $user = Auth::user();
            $hour = now()->setTimezone('Asia/Jakarta')->hour;
            $greeting = match (true) {
                $hour >= 5 && $hour < 12 => 'pagi',
                $hour < 15 => 'siang',
                default => 'malam',
            };
            $greetingText = match ($greeting) {
                'pagi' => 'Selamat pagi',
                'siang' => 'Selamat siang',
                default => 'Selamat malam',
            };
            $name = $user?->name ?? ($user?->email ? explode('@', $user->email)[0] : 'Admin');

            Alert::success('Berhasil Login', $greetingText . ', ' . $name . '! Dashboard siap digunakan.');
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            "email" => "Email atau password salah",
        ])->onlyInput("email"); //menyimpat input email lama. agar tidak menginput ulang
    }

    public function actionLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success("Done", "Kowen Uwis Metu");
        return redirect()->route("login");
    }
}
