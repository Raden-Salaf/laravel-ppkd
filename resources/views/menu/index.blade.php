@extends('layouts.app')

{{-- @include('layouts.app') --}}
{{-- ini untuk memanggil file app.blade.php yang ada di folder layouts, karena kita ingin menggunakan layout yang sudah
dibuat di app.blade.php, jadi kita tidak perlu menulis ulang layout yang sudah dibuat di app.blade.php, kita hanya perlu
memanggilnya saja dengan menggunakan @include('layouts.app') -> tapi tidak include dengan CSS (hanya nempel) --}}

@section('title', 'User Management')
{{-- Menambah isi title dalam file app.blade.php/ atau menggabungkan istilahnya --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('menu.create') }}" class="btn btn-primary">Create New Menu</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Url</th>
                        <th>Role (Akses)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $menu->name ?? '' }}</td>
                            <td>{{ $menu->parent_id ? $menu->parents->name : '-' }}</td>
                            <td>{{ $menu->url ?? '-' }}</td>
                            <td>
                                @foreach ($menu->roles as $role)
                                    <span class="badge bg-info text-dark">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($menu->is_active)
                                    <span class="badge bg-success text-dark">Aktif</span>
                                @else
                                    <span class="badge bg-danger text-dark">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href=" {{ route('menu.edit', $menu->id) }}" class="btn icon btn-success btn-sm ">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('menu.destroy', $menu->id) }}" method="post" class="d-inline">
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

{{-- ini untuk menampilkan isi dari halaman menu index, karena kita sudah menggunakan layout yang sudah dibuat di
app.blade.php, maka kita hanya perlu menulis isi dari halaman menu index saja, jadi kita tidak perlu menulis ulang
layout yang sudah dibuat di app.blade.php, kita hanya perlu menulis isi dari halaman menu index saja dengan menggunakan
@section('content') dan @endsection, jadi semua isi yang ada di antara @section('content') dan @endsection akan
ditampilkan di dalam layout yang sudah dibuat di app.blade.php, karena di app.blade.php sudah menggunakan
@yield('content'), maka semua isi yang ada di antara @section('content') dan @endsection akan ditampilkan di dalam
layout yang sudah dibuat di app.blade.php pada bagian @yield('content') --}}
