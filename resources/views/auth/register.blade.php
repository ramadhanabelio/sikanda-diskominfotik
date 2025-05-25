@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <h2>Daftar ke SiKANDA</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group">
            <i class="fa fa-vcard"></i>
            <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
        </div>
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
        </div>
        <div class="input-group">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
        </div>
        <button type="submit" class="btn">Daftar</button>
    </form>
    <div class="links">
        <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </div>
@endsection
