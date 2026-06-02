@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="page-header">
        <h2>Detail Barang</h2>
        <p>Informasi lengkap barang <strong>{{ $barang->nama_barang }}</strong>.</p>
    </div>

    <div class="card table-card">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">KODE BARANG</label>
                        <div class="fw-bold fs-5">{{ $barang->kode_barang }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">NAMA BARANG</label>
                        <div class="fw-bold fs-5">{{ $barang->nama_barang }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">KATEGORI</label>
                        <div><span class="badge bg-info bg-opacity-10 text-info fs-6">{{ $barang->kategori }}</span></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">JUMLAH STOK</label>
                        <div>
                            @if($barang->jumlah_stok <= 5)
                                <span class="badge bg-danger fs-6">{{ $barang->jumlah_stok }} unit</span>
                            @elseif($barang->jumlah_stok <= 20)
                                <span class="badge bg-warning text-dark fs-6">{{ $barang->jumlah_stok }} unit</span>
                            @else
                                <span class="badge bg-success fs-6">{{ $barang->jumlah_stok }} unit</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">HARGA</label>
                        <div class="fw-bold fs-5 text-primary">Rp {{ number_format($barang->harga, 0, ',', '.') }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:0.8rem;">TOTAL NILAI</label>
                        <div class="fw-bold fs-5">Rp {{ number_format($barang->harga * $barang->jumlah_stok, 0, ',', '.') }}</div>
                    </div>
                </div>
                @if($barang->deskripsi)
                <div class="col-12">
                    <label class="form-label text-muted" style="font-size:0.8rem;">DESKRIPSI</label>
                    <div class="p-3 bg-light rounded">{{ $barang->deskripsi }}</div>
                </div>
                @endif
                <div class="col-12">
                    <small class="text-muted">
                        Dibuat: {{ $barang->created_at->format('d M Y H:i') }} |
                        Diperbarui: {{ $barang->updated_at->format('d M Y H:i') }}
                    </small>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                @if(auth()->user()->isAdmin())
                <a href="/barang/{{ $barang->id }}/edit" class="btn btn-warning">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
                @endif
                <a href="/barang" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
