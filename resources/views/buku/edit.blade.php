@extends('template')
@section('title')
    Buku
@endsection
@section('header')
    <h4>Edit Buku</h4>
@endsection
@section('main')
    <form action="{{ url('/buku/' . $DataBuku->id_buku) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Kategori Buku</label>
        <select name="id_kategori_buku">
            @if (!empty($DataKategori))
                @foreach($DataKategori as $key => $Kategori)
                    <option value="{{ $Kategori->id_kategori_buku }}" @if ($Kategori->id_kategori_buku == $DataBuku->id_kategori_buku)
                    selected @endif>{{ $Kategori->kategori_buku }}</option>
                @endforeach
            @endif
        </select><br><br>
        <label>Judul Buku</label>
        <textarea name="judul">{{ $DataBuku->judul}}</textarea><br><br>
        <label>Pengarang</label>
        <textarea name="pengarang">{{ $DataBuku->pengarang}}</textarea><br><br>
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="{{ $DataBuku->tahun_terbit}}"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection