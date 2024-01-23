@extends('layouts.main')

@section('content')
    <div class="container mt-5 login-page">
        <form action="{{ route('auth') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @if (session('login-error'))
            <div class="alert alert-danger">
                {{ session('login-error') }}
            </div>
            @endif
            <button type="submit" class="btn btn-green">Zaloguj</button>
        </form>
    </div>
@endsection
