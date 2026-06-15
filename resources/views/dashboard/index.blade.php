@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @php
        $user = auth()->user();
        $username = $user?->name ?? ($user?->email ? explode('@', $user->email)[0] : 'User');
        $initial = strtoupper(substr($username, 0, 1));
        $avatarSvg = 'data:image/svg+xml;utf8,' . rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"><rect width="100%" height="100%" rx="40" fill="#2563eb"/><text x="50%" y="54%" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="32" fill="white">' . $initial . '</text></svg>');

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

        $stats = $stats ?? [
            ['title' => 'Total User', 'value' => '0', 'icon' => 'bi bi-person-fill', 'accent' => 'linear-gradient(135deg, #4f46e5, #7c3aed)', 'subtitle' => 'Data akun pengguna'],
            ['title' => 'Total Student', 'value' => '0', 'icon' => 'bi bi-mortarboard-fill', 'accent' => 'linear-gradient(135deg, #0f766e, #14b8a6)', 'subtitle' => 'Data siswa terdaftar'],
            ['title' => 'Total Major', 'value' => '0', 'icon' => 'bi bi-book-half', 'accent' => 'linear-gradient(135deg, #ea580c, #f59e0b)', 'subtitle' => 'Program studi aktif'],
        ];

        $focusItems = [
            ['title' => 'Review akses user', 'desc' => 'Periksa akun yang baru dibuat hari ini', 'status' => 'Urgent', 'chipBg' => '#fef2f2', 'chipColor' => '#dc2626'],
            ['title' => 'Sinkron data siswa', 'desc' => 'Pastikan data terbaru sudah masuk ke sistem', 'status' => 'On Track', 'chipBg' => '#ecfdf5', 'chipColor' => '#16a34a'],
            ['title' => 'Backup harian', 'desc' => 'Jadwal pencadangan otomatis siap dijalankan', 'status' => 'Pending', 'chipBg' => '#fefce8', 'chipColor' => '#ca8a04'],
        ];

        $timeline = [
            ['title' => 'User baru terdaftar', 'desc' => 'Akun admin baru berhasil dibuat dan aktif', 'time' => '5 menit lalu', 'icon' => 'bi bi-person-plus-fill', 'accent' => '#2563eb'],
            ['title' => 'Locker diperbarui', 'desc' => '2 unit locker baru siap dipakai', 'time' => '27 menit lalu', 'icon' => 'bi bi-key-fill', 'accent' => '#0f766e'],
            ['title' => 'Laporan bulanan siap', 'desc' => 'Ringkasan performa dashboard sudah tersedia', 'time' => '1 jam lalu', 'icon' => 'bi bi-bar-chart-fill', 'accent' => '#ea580c'],
        ];
    @endphp

    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 rounded-4 overflow-hidden shadow-sm"
                style="background: radial-gradient(circle at top left, #4f46e5 0%, #1d4ed8 35%, #0f172a 100%);">
                <div class="card-body p-4 p-lg-5 text-white">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle p-3" style="background: rgba(255,255,255,0.16);">
                                    <i class="bi bi-speedometer2 fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-1 text-uppercase small fw-semibold"
                                        style="letter-spacing: 0.2em; color: rgba(255,255,255,0.72);">Control Center</p>
                                    <h2 class="mb-1 fw-bold">{{ $greetingText }}, {{ $username }} 👋</h2>
                                    <p class="mb-0" style="color: rgba(255,255,255,0.78);">Ringkasan sistem, aktivitas
                                        terbaru, dan prioritas penting tersedia dalam satu tampilan modern.</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background: rgba(255,255,255,0.16);">Realtime Monitoring</span>
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background: rgba(255,255,255,0.16);">Secure Access</span>
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background: rgba(255,255,255,0.16);">Modern UX</span>
                            </div>
                        </div>

                        <div class="rounded-4 p-3 border border-white border-opacity-25"
                            style="background: rgba(255,255,255,0.12); min-width: 260px;">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="position-relative">
                                    <img src="{{ $avatarSvg }}" alt="{{ $username }}"
                                        class="rounded-circle border border-white shadow-sm"
                                        style="width: 58px; height: 58px; object-fit: cover;">
                                    <span
                                        class="position-absolute bottom-0 end-0 rounded-circle border border-white shadow-sm"
                                        style="width: 16px; height: 16px; background: #22c55e; display: inline-block;"></span>
                                </div>
                                <div>
                                    <p class="mb-0 small" style="color: rgba(255,255,255,0.72);">Akses aktif</p>
                                    <h5 class="mb-0 fw-semibold">{{ $username }}</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center small"
                                style="color: rgba(255,255,255,0.8);">
                                <span>Login terakhir</span>
                                <span class="fw-semibold">Sekarang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12 col-xl-8">
            <div class="row g-4">
                @foreach ($stats as $stat)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card border-0 rounded-4 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="mb-2 small fw-semibold" style="color: #64748b;">{{ $stat['title'] }}</p>
                                        <h3 class="fw-bold mb-1" style="color: #0f172a;">{{ $stat['value'] }}</h3>
                                        <p class="mb-0 small" style="color: #64748b;">{{ $stat['subtitle'] }}</p>
                                    </div>
                                    <div class="rounded-3 p-3 text-white" style="background: {{ $stat['accent'] }};">
                                        <i class="{{ $stat['icon'] }} fs-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="mb-0 fw-bold">Prioritas Hari Ini</h5>
                            <p class="mb-0 small" style="color: #64748b;">Hal penting yang perlu diperhatikan.</p>
                        </div>
                        <span class="badge rounded-pill bg-primary-subtle text-primary">3 item</span>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        @foreach ($focusItems as $item)
                            <div class="p-3 rounded-3 border" style="border-color: #e2e8f0;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold" style="color: #0f172a;">{{ $item['title'] }}</span>
                                    <span class="badge rounded-pill"
                                        style="background: {{ $item['chipBg'] }}; color: {{ $item['chipColor'] }};">{{ $item['status'] }}</span>
                                </div>
                                <p class="mb-0 mt-2 small" style="color: #64748b;">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12 col-xl-7">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-0 fw-bold">Aktivitas Terbaru</h5>
                            <p class="mb-0 small" style="color: #64748b;">Riwayat singkat sistem hari ini.</p>
                        </div>
                        <a href="#" class="small fw-semibold text-decoration-none" style="color: #2563eb;">Lihat semua</a>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($timeline as $item)
                            <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background: #f8fafc;">
                                <div class="rounded-circle p-2 text-white" style="background: {{ $item['accent'] }};">
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center gap-3">
                                        <h6 class="mb-1 fw-semibold" style="color: #0f172a;">{{ $item['title'] }}</h6>
                                        <span class="small" style="color: #64748b;">{{ $item['time'] }}</span>
                                    </div>
                                    <p class="mb-0 small" style="color: #64748b;">{{ $item['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Ringkasan Mingguan</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="rounded-3 p-3" style="background: linear-gradient(135deg, #eff6ff, #f8fafc);">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold" style="color: #0f172a;">Target pencapaian</span>
                                <span class="fw-semibold text-primary">82%</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 8px;">
                                <div class="progress-bar bg-primary" style="width: 82%"></div>
                            </div>
                        </div>

                        <div class="rounded-3 p-3 border" style="border-color: #e2e8f0;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span style="color: #64748b;">Kinerja operasional</span>
                                <span class="fw-semibold" style="color: #0f172a;">Stable</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span style="color: #64748b;">Respons time</span>
                                <span class="fw-semibold text-success">1.2s</span>
                            </div>
                        </div>

                        <div class="rounded-3 p-3 border" style="border-color: #e2e8f0;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span style="color: #64748b;">Notifikasi aktif</span>
                                <span class="badge bg-primary-subtle text-primary">12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
