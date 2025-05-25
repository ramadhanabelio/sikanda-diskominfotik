@extends('layouts.auth')

@section('content')
    <h2>Masuk ke SiKANDA</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="email" placeholder="Email atau Username" required>
        </div>
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Masuk</button>
    </form>
    <div class="links">
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>
@endsection
