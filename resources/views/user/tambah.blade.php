@extends('template')
@section('title')
    User
@endsection
@section('header')
    <h4>Tambah User</h4>
@endsection
@section('main')

    <form action="{{ url('/user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Foto</label>
        <input type="file" class="@error('foto') is-invalid @enderror" name="foto"><br>
        @error('foto')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Nama</label>
        <input type="text" class="@error('nama') is-invalid @enderror" name="nama" value=""><br>
        @error('nama')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Email</label>
        <input type="text" class="@error('email') is-invalid @enderror" name="email" value=""><br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Password</label>
        <input type="text" class="@error('password') is-invalid @enderror" name="password" value=""><br>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Level User</label>
        <select name="level">
            <option value="Superadmin">Superadmin</option>
            <option value="Admin">Admin</option>
        </select>
        <br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection