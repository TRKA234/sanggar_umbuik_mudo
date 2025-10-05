@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4">Register</h3>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning w-100 fw-bold">Register</button>
        </form>

        <p class="text-center mt-3">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-decoration-none text-danger fw-bold">Login</a>
        </p>
    </div>
</div>
@endsection
