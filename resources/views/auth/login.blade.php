@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4">Login</h3>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Tombol Login warna kuning -->
            <button type="submit" class="btn btn-warning w-100 fw-bold">Login</button>
        </form>

        <p class="text-center mt-3">
            Belum punya akun?
            <!-- Register warna merah -->
            <a href="{{ route('register') }}" class="text-decoration-none text-danger fw-bold">Register</a>
        </p>
    </div>
</div>
@endsection
