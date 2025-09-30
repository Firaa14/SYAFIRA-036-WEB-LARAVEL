@extends('template')
@section('title')

    Kategori Buku
@endsection
@section('header')
    <h4>Edit Kategori Buku</h4>
@endsection
@section('main')
    <form action="{{ url('kategori-buku.' . $KategoriBuku->id_kategori_buku) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Nama Kategori Buku</label>
        <input type="text" name="kategori_buku" value="{{ $KategoriBuku->kategori_buku}}"><br>
        <input type="submit" value="Simpan">
    </form>
@endsection