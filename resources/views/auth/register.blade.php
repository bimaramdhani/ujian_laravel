@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="auth-logo">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h1 class="auth-title">Buat Akun Baru</h1>
    <p class="auth-subtitle">Daftar untuk menggunakan Stock Barang App</p>

    @if($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0" style="padding-left: 1rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0; border-right:0; background:#f8fafc;">
                    <i class="bi bi-person text-muted"></i>
                </span>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                       placeholder="Nama lengkap Anda" required autofocus
                       style="border-left:0; border-radius:0 10px 10px 0;">
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0; border-right:0; background:#f8fafc;">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                       placeholder="nama@email.com" required
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
                       placeholder="Minimal 6 karakter" required
                       style="border-left:0; border-radius:0 10px 10px 0;">
            </div>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
                <span class="input-group-text" style="border-radius:10px 0 0 10px; border:1.5px solid #e2e8f0; border-right:0; background:#f8fafc;">
                    <i class="bi bi-lock-fill text-muted"></i>
                </span>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                       placeholder="Ulangi password" required
                       style="border-left:0; border-radius:0 10px 10px 0;">
            </div>
        </div>

        <button type="submit" class="btn btn-auth">
            <i class="bi bi-person-plus me-1"></i> Daftar
        </button>
    </form>

    <div class="auth-footer">
        Sudah punya akun? <a href="/login">Masuk sekarang</a>
    </div>
@endsection
