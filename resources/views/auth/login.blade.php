@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="auth-logo">
        <i class="bi bi-box-seam-fill"></i>
    </div>
    <h1 class="auth-title">Selamat Datang</h1>
    <p class="auth-subtitle">Masuk ke akun Stock Barang Anda</p>

    @if($errors->any())
        <div class="alert alert-danger mb-3">
            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0; border-right:0; background:#f8fafc;">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                       placeholder="nama@email.com" required autofocus
                       style="border-left:0; border-radius:0 10px 10px 0;">
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0; border-right:0; background:#f8fafc;">
                    <i class="bi bi-lock text-muted"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Masukkan password" required
                       style="border-left:0; border-radius:0 10px 10px 0;">
            </div>
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember" style="font-size:0.85rem; color:#64748b;">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-auth">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
        </button>
    </form>

    <div class="auth-footer">
        Belum punya akun? <a href="/register">Daftar sekarang</a>
    </div>
@endsection
