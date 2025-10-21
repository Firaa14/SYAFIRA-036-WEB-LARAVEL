@extends('template')
@section('title')
    Penerbit
@endsection
@section('header')
    <h4>Edit Penerbit</h4>
@endsection

@section('main')
    <form action="{{ url('/penerbit/' . $PenerbitBuku->id_penerbit) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Nama Penerbit</label>
        <input type="text" name="penerbit" value="{{ $PenerbitBuku->penerbit}}"><br><br>
        <label>Alamat</label>
        <textarea name="alamat">{{ $PenerbitBuku->alamat}}</textarea><br><br>
        <label>No. Telp</label>
        <input type="text" name="no_telp" value="{{ $PenerbitBuku->telepon->telepon ?? '' }}"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection

@section('footer')
    <footer>© 2024 Vokasi UB</footer>
@endsection