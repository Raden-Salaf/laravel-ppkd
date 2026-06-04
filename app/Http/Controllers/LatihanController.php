<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        // extends -> memberi wariskan ke child, LatihanController adalah parent(anak) dari Controller
        // Laravel index : akan di load pertama kali ketika kita mengakses route yang diarahkan ke controller ini (diload awalan)
        return view('latihan');
    }

    public function tambah()
    {
        // untuk mengakses href yang diarahkan ke controller ini, maka akan di load ketika kita mengakses route yang diarahkan ke method ini (diload ketika diakses)
        $penjumlahan = 0;
        return view('tambah', compact('penjumlahan'));
        // compact('jumlah') -> untuk mengirimkan data ke view dengan nama variabel yang sama dengan nama variabel yang dikirimkan

        // return view('tambah', ['jumlah'=> $jumlah]);
        // ['jumlah'=> $jumlah] -> untuk mengirimkan data ke view dengan nama variabel yang berbeda dengan nama variabel yang dikirimkan
    }

    public function actionTambah(Request $request)
    {
        // untuk mengakses href yang diarahkan ke controller ini, maka akan di load ketika kita mengakses route yang diarahkan ke method ini (diload ketika diakses)
        // untuk menangkap data yang dikirimkan dari form, kita bisa menggunakan Request $request
        // $request->input('nama_input') -> untuk menangkap data yang dikirimkan dari form dengan nama input tertentu
        // $request->all() -> untuk menangkap semua data yang dikirimkan dari form
        // $request->only(['nama_input1', 'nama_input2']) -> untuk menangkap data yang dikirimkan dari form dengan nama input tertentu saja
        // $request->except(['nama_input1', 'nama_input2']) -> untuk menangkap data yang dikirimkan dari form kecuali nama input tertentu
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $penjumlahan = $angka1 + $angka2;
        return view('tambah', compact('penjumlahan'));
    }
    public function kurang()
    {
        $pengurangan = 0;
        return view('kurang', compact('pengurangan'));
    }

    public function actionKurang(Request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $pengurangan = $angka1 - $angka2;
        return view('kurang', compact('pengurangan'));
    }
    public function kali()
    {
        $perkalian = 0;
        return view('kali', ['perkalian' => $perkalian]);
    }

    public function actionKali(Request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $perkalian = $angka1 * $angka2;
        return view('kali', compact('perkalian'));
    }
    public function bagi()
    {
        $pembagian = 0;
        return view('bagi', compact('pembagian'));
    }

    public function actionBagi(Request $request)
    {
        $angka1 = $request->input('angka_1');
        $angka2 = $request->input('angka_2');

        $pembagian = $angka1 / $angka2;
        return view('bagi', ['pembagian' => $pembagian]);
    }
}
