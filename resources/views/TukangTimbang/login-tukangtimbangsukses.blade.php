<!DOCTYPE html>
<html lang="en">
<head>
    @include('TukangTimbang.partials.header')
</head>
<body>

    @include('TukangTimbang.partials.sidebar')

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-4 rounded-3 shadow-sm">
            <div>
                <h2 class="fw-bold text-success">Dashboard</h2>
                <p class="text-muted mb-0">Halo, {{ $username }}! Selamat bekerja.</p>
            </div>
            <i class="bi bi-speedometer2 fs-1 text-success"></i>
        </div>

        <!-- Statistik Hari Ini -->
        <div class="row mb-4">
            <!-- Kiri: Transaksi (Kuning) -->
            <div class="col-md-6">
                <div class="card text-dark p-4 border-0 rounded-4 shadow-sm h-100" style="background: #ffc107;">
                    <h5>Transaksi Hari Ini</h5>
                    <h1 class="fw-bold display-4 mb-0">{{ $dataHariIni->count() }}</h1>
                </div>
            </div>

            <!-- Kanan: Berat (Hijau) -->
            <div class="col-md-6">
                <div class="card text-white p-4 border-0 rounded-4 shadow-sm h-100" style="background: #2e7d57;">
                    <h5>Total Berat Hari Ini</h5>
                    <h1 class="fw-bold display-4 mb-0">{{ $dataHariIni->sum('berat') }} <span class="fs-4">Kg</span></h1>
                </div>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="card p-4 border-0 shadow-sm rounded-4 bg-white">
            <h5 class="mb-3 text-secondary"><i class="bi bi-clock-history"></i> 5 Transaksi Terakhir</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Waktu</th>
                            <th>Petani</th>
                            <th>Berat</th>
                            <th>Keterangan</th> <!-- SUDAH DIGANTI -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataTerbaru as $data)
                        <tr>
                            <td>{{ $data->created_at->format('H:i') }}</td>
                            <td>{{ $data->nama_petani }}</td>
                            <td class="fw-bold">{{ $data->berat }} Kg</td>
                            <td>{{ $data->keterangan ?? '-' }}</td> <!-- SUDAH DIGANTI -->
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada aktivitas hari ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @include('TukangTimbang.partials.footer')
    </div>
</body>
</html>
