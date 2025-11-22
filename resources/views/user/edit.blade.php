@extends('template')
@section('title')
    User
@endsection
@section('header')
    <h4>Edit User</h4>

@endsection
@section('main')
    <a href="{{url('/user')}}">Kembali</a>
    <form method="post" action="{{ url('/user.' . $DataUser->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Foto</label>
        <input type="file" class="@error('foto') is-invalid @enderror" name="foto"><br>
        *Jangan diisi jika tidak ingin mengubah foto<br>
        @error('foto')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Nama</label>
        <input type="text" class="@error('nama') is-invalid @enderror" name="nama" value="{{ $DataUser->name}}"><br>
        @error('nama')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Email</label>
        <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ $DataUser->email}}"><br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Password</label>
        <input type="text" class="@error('password') is-invalid @enderror" name="password" value=""><br>
        *Jangan diisi jika tidak ingin mengubah <br>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Level User</label>
        <select name="level">
            <option value="Superadmin" @if($DataUser->level == "Superadmin") selected @endif>Superadmin</option>
            <option value="Admin" @if($DataUser->level == "Admin") selected @endif>Admin</option>
        </select>

        <br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection