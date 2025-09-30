@extends('template')
@section('title')
    Tag
@endsection
@section('header')
    <h4>Edit Tag</h4>
@endsection
@section('main')
    <form action="{{ url('tag.' . $TagBuku->id_tag) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Tag</label>
        <input type="text" name="tag" value="{{ $TagBuku->tag}}"><br>
        <input type="submit" value="Simpan">
    </form>
@endsection