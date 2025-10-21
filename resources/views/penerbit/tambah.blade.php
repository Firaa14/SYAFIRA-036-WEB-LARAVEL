@extends('template')
@section('title')
    Penerbit
@endsection

@section('header')
    <h4>Tambah Penerbit</h4>
@endsection
@section('main')
    <form action="{{ url('/penerbit') }}" method="POST">
        @csrf
        <label>Nama Penerbit</label>
        <input type="text" name="penerbit"><br><br>
        <label>Alamat</label>
        <textarea name="alamat"></textarea><br><br>
        <label>No. Telp</label>
        <input type="text" name="no_telp"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection