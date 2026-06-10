@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @php
        $user = auth()->user();
        $username = $user?->name ?? ($user?->email ? explode('@', $user->email)[0] : 'User');
        $initial = strtoupper(substr($username, 0, 1));
        $avatarSvg = 'data:image/svg+xml;utf8,' . rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"><rect width="100%" height="100%" rx="40" fill="#198754"/><text x="50%" y="54%" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="32" fill="white">' . $initial . '</text></svg>');
    @endphp

    <div
        class="mt-3 d-flex align-items-center gap-3 max-w-sm rounded-3 border border-success-subtle bg-success-subtle p-3 shadow-sm">
        <div class="position-relative flex-shrink-0">
            <img src="{{ $avatarSvg }}" alt="{{ $username }}" class="rounded-circle border border-white shadow-sm"
                style="width: 40px; height: 40px; object-fit: cover;">
            <span class="position-absolute top-0 start-0 translate-middle rounded-circle border border-white bg-success"
                style="width: 10px; height: 10px; display: inline-block;">
            </span>
        </div>

        <div class="min-w-0">
            <p class="mb-1 text-xs fw-bold text-success">Pengguna sedang aktif</p>
            <h2 class="text-sm fw-semibold text-dark text-truncate">{{ $username }}</h2>
            <p class="text-xs text-muted text-truncate">{{ $user->email ?? '-' }}</p>
        </div>
    </div>
@endsection