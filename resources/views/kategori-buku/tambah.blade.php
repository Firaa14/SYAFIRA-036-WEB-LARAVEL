@extends('template')
@section('title')
    Buku
@endsection
@section('header')
    <h4>Tambah Buku</h4>
@endsection
@section('main')
    <form action="{{ url('/buku') }}" method="POST">
        @csrf
        <label>Kategori Buku</label>
        <select name="kategori">
            @if (!empty($DataKategori))
                @foreach($DataKategori as $key => $Kategori)
                    <option value="{{ $Kategori->id_kategori_buku }}">
                        {{ $Kategori->kategori_buku }}
                    </option>
                @endforeach
            @endif
        </select><br><br>
        <label>Judul Buku</label>
        <textarea name="judul"></textarea><br><br>
        <label>Pengarang</label>
        <textarea name="pengarang"></textarea><br><br>
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection