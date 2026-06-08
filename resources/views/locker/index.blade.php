@extends('layouts.app')

{{-- @include('layouts.app') --}}
{{-- ini untuk memanggil file app.blade.php yang ada di folder layouts, karena kita ingin menggunakan layout yang sudah
dibuat di app.blade.php, jadi kita tidak perlu menulis ulang layout yang sudah dibuat di app.blade.php, kita hanya perlu
memanggilnya saja dengan menggunakan @include('layouts.app') -> tapi tidak include dengan CSS (hanya nempel) --}}

@section('title', 'Locker Management')
{{-- Menambah isi title dalam file app.blade.php/ atau menggabungkan istilahnya --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('locker.create') }}" class="btn btn-primary">Create New locker</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Locker Code</th>
                        <th>Batch</th>
                        <th>Major Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lockers as $index => $locker)
                        <tr>
                            <td>{{ $loop->iteration }}</td> {{-- -> penomoran bawaan laravel --}}
                            {{-- <td>{{ $index += 1 }}</td> --}}
                            <td>{{ $locker->locker_name ?? "" }}</td>
                            <td>{{ $locker->batch ?? "" }}</td>
                            <td>{{ $locker->major ?? "" }}</td>
                            <td>
                                @if($locker->status == 'Available')
                                    <span class="badge text-white bg-info">{{ $locker->status }}</span>
                                @elseif($locker->status == 'Unavailable')
                                    <span class="badge text-white bg-secondary">{{ $locker->status }}</span>
                                @elseif($locker->status == 'Damaged')
                                    <span class="badge text-white bg-warning">{{ $locker->status }}</span>
                                @elseif($locker->status == 'Missing')
                                    <span class="badge text-white bg-danger">{{ $locker->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('locker.edit', $locker->id) }}" class="btn icon btn-primary btn-sm ">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('locker.destroy', $locker->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn icon btn-danger btn-sm ">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

{{-- ini untuk menampilkan isi dari halaman locker index, karena kita sudah menggunakan layout yang sudah dibuat di
app.blade.php, maka kita hanya perlu menulis isi dari halaman locker index saja, jadi kita tidak perlu menulis ulang
layout yang sudah dibuat di app.blade.php, kita hanya perlu menulis isi dari halaman locker index saja dengan
menggunakan
@section('content') dan @endsection, jadi semua isi yang ada di antara @section('content') dan @endsection akan
ditampilkan di dalam layout yang sudah dibuat di app.blade.php, karena di app.blade.php sudah menggunakan
@yield('content'), maka semua isi yang ada di antara @section('content') dan @endsection akan ditampilkan di dalam
layout yang sudah dibuat di app.blade.php pada bagian @yield('content') --}}