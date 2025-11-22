@extends('template')
@section('title')
    Login
@endsection
@section('header')
    <h4>Login</h4>
@endsection
@section('main')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br>
        <label>Password</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
@endsection