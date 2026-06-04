<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
</head>
<body>
    <h1>@yield('title')</h1>
    <a href="/tambah">Tambah</a>
    {{-- //  -> Url bodo amat, bisa pake url() atau route() untuk generate url yang lebih dinamis --}}
    <a href="{{ url('kurang') }}">Kurang</a>
    {{-- -> Url yang dinamis, bisa pake url() atau route() untuk generate url yang lebih dinamis --}}
    <a href="{{ route('kali') }}">Kali</a>
    {{-- url ketat, kalo kita pake route, maka harus panggil juga di routes/web.php --}}
    <a href="{{ route('bagi') }}">Bagi</a>
    <a href="{{ url()->previous() }}">Kembali</a>

    <main>
        @yield('content')
    </main>
</body>
</html>
