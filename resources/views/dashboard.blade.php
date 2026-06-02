@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h2>Dashboard</h2>
            <p>Selamat datang, {{ auth()->user()->name }}! Berikut ringkasan data stock barang.</p>
        </div>
        <div>
            <span class="text-muted" style="font-size:0.85rem;">
                <i class="bi bi-calendar3 me-1"></i>{{ now()->translatedFormat('l, d F Y') }}
            </span>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:rgba(59,130,246,0.1); color:#3b82f6;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.78rem; font-weight:500;">Total Barang</div>
                        <div class="fw-bold fs-4" style="color:#1e293b;">{{ number_format($totalBarang) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:rgba(16,185,129,0.1); color:#10b981;">
                        <i class="bi bi-stack"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.78rem; font-weight:500;">Total Stok</div>
                        <div class="fw-bold fs-4" style="color:#1e293b;">{{ number_format($totalStok) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:rgba(139,92,246,0.1); color:#8b5cf6;">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.78rem; font-weight:500;">Nilai Inventaris</div>
                        <div class="fw-bold" style="font-size:1.1rem; color:#1e293b;">Rp {{ number_format($totalNilai, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:rgba(239,68,68,0.1); color:#ef4444;">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.78rem; font-weight:500;">Stok Rendah</div>
                        <div class="fw-bold fs-4" style="color:#1e293b;">{{ number_format($stokRendah) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->isAdmin())
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:rgba(245,158,11,0.1); color:#f59e0b;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.78rem; font-weight:500;">Total Users</div>
                        <div class="fw-bold fs-4" style="color:#1e293b;">{{ number_format($totalUser) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Barang Terbaru -->
    <div class="card table-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2"></i>Barang Terbaru</h6>
            <a href="/barang" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangTerbaru as $barang)
                        <tr>
                            <td><span class="badge bg-light text-dark">{{ $barang->kode_barang }}</span></td>
                            <td class="fw-medium">{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->kategori }}</td>
                            <td>
                                @if($barang->jumlah_stok <= 5)
                                    <span class="badge bg-danger">{{ $barang->jumlah_stok }}</span>
                                @elseif($barang->jumlah_stok <= 20)
                                    <span class="badge bg-warning text-dark">{{ $barang->jumlah_stok }}</span>
                                @else
                                    <span class="badge bg-success">{{ $barang->jumlah_stok }}</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada data barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
