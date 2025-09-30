@extends('template')
@section('title')
    Tag
@endsection
@section('header')
    <h4>Tambah Tag</h4>
@endsection
@section('main')
    <form action="{{ url('/tag') }}" method="POST">
        @csrf
        <label>Tag</label>
        <input type="text" name="tag"><br><br>
        <input type="submit" value="Simpan">
    </form>
@endsection