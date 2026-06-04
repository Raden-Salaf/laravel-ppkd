@extends('main')
@section('title', 'Tambah')
@section('content')


    <h1>Tambah-tambahan</h1>
    <a href="/tambah">Tambah</a>
    {{-- //  -> Url bodo amat, bisa pake url() atau route() untuk generate url yang lebih dinamis --}}
    <a href="{{ url('kurang') }}">Kurang</a>
    {{-- -> Url yang dinamis, bisa pake url() atau route() untuk generate url yang lebih dinamis --}}
    <a href="{{ route('kali') }}">Kali</a>
    {{-- route adalah url yang lebih complexs, dan wajib ada tambahan di route/web.php dengan name->('')  --}}
    <a href="{{ route('bagi') }}">Bagi</a>
    <a href="{{ url()->previous() }}">Kembali</a>

    <br><br>
    <form action="{{ url('action-tambah') }}" method="post">
        @csrf
        {{-- Input type name_token --}}
        <label for="angka1">Angka 1:</label>
        <input type="text" id="angka1" name="angka_1" placeholder="masukan angka pertama">
        +
        <label for="angka2">Angka 2:</label>
        <input type="text" id="angka2" name="angka_2" placeholder="masukan angka kedua">

        <br>

        <button type="submit">Tambah</button>
    </form>
    <h1>Jumlahnya : {{ $penjumlahan ?? 0 }}</h1>

    @endsection
</body>
</html>
