@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h2>Data Barang</h2>
            <p>Kelola semua data barang dalam inventaris.</p>
        </div>
        @if(auth()->user()->isAdmin())
        <a href="/barang-create" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Barang
        </a>
        @endif
    </div>

    <!-- Search -->
    <div class="card table-card mb-3">
        <div class="card-body py-3">
            <form method="GET" action="/barang" class="d-flex gap-2">
                <div class="input-group" style="max-width:400px;">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                           placeholder="Cari nama, kode, atau kategori..." style="border-left:0;">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
                @if(request('search'))
                    <a href="/barang" class="btn btn-outline-secondary">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card table-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $index => $barang)
                        <tr>
                            <td>{{ $barangs->firstItem() + $index }}</td>
                            <td><span class="badge bg-light text-dark font-monospace">{{ $barang->kode_barang }}</span></td>
                            <td class="fw-medium">{{ $barang->nama_barang }}</td>
                            <td><span class="badge bg-info bg-opacity-10 text-info">{{ $barang->kategori }}</span></td>
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
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="/barang/{{ $barang->id }}" class="btn btn-sm btn-outline-primary" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @if(auth()->user()->isAdmin())
                                    <a href="/barang/{{ $barang->id }}/edit" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="/barang/{{ $barang->id }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada data barang.
                                @if(auth()->user()->isAdmin())
                                    <br><a href="/barang-create" class="mt-2 d-inline-block">Tambah barang pertama</a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($barangs->hasPages())
        <div class="card-footer bg-white">
            {{ $barangs->withQueryString()->links() }}
        </div>
        @endif
    </div>
@endsection
