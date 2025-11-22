@extends('template')
@section('title')
    Profil User
@endsection
@section('header')
    <h4>Profil User</h4>
@endsection
@section('main')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <table border="1">
        <tbody>
            <tr>
                <td colspan="2">Data User</td>
            </tr>
            <tr>
                <td><strong>Foto User<strong></td>
                <td><img src="{{asset('foto/' . $user->foto)}}"></td>
            </tr>
            <tr>
                <td width="20%"><strong>Nama<strong></td>
                <td width="80%">{{ $user->name}}</td>
            </tr>
            <tr>
                <td width="20%"><strong>Email<strong></td>
                <td width="80%">{{ $user->email}}</td>
            </tr>
            <tr>
                <td width="20%"><strong>Level<strong></td>
                <td width="80%">{{ $user->level}}</td>
            </tr>
        </tbody>
    </table>
@endsection