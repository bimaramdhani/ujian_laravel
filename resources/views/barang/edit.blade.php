@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <div class="page-header">
        <h2>Edit Barang</h2>
        <p>Perbarui data barang <strong>{{ $barang->nama_barang }}</strong>.</p>
    </div>

    <div class="card table-card">
        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0" style="padding-left:1rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/barang/{{ $barang->id }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="kode_barang" class="form-label fw-medium">Kode Barang *</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                               value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_barang" class="form-label fw-medium">Nama Barang *</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                               value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="kategori" class="form-label fw-medium">Kategori *</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                               value="{{ old('kategori', $barang->kategori) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah_stok" class="form-label fw-medium">Jumlah Stok *</label>
                        <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok"
                               value="{{ old('jumlah_stok', $barang->jumlah_stok) }}" min="0" required>
                    </div>
                    <div class="col-md-3">
                        <label for="harga" class="form-label fw-medium">Harga (Rp) *</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                               value="{{ old('harga', $barang->harga) }}" min="0" step="100" required>
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Perbarui
                    </button>
                    <a href="/barang" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
