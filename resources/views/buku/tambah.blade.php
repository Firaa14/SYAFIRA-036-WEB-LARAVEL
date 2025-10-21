@extends('template')
@section('title')
    Tambah Buku
@endsection
@section('header')
    <h4>Tambah Buku</h4>
@endsection
@section('main')
    <form action="{{ url('/buku') }}" method="POST">
        @csrf
        <label>Kategori Buku</label>
        <select name="id_kategori_buku">
            @foreach($DataKategori ?? [] as $kategori)
                <option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->kategori_buku }}</option>
            @endforeach
        </select><br><br>
        <label>Judul Buku</label>
        <input type="text" name="judul"><br><br>
        <label>Pengarang</label>
        <input type="text" name="pengarang"><br><br>
        <label>Tahun Terbit</label>
        <input type="text" name="tahun_terbit"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection
@section('footer')
    <footer>© 2025 Vokasi UB</footer>
@endsection