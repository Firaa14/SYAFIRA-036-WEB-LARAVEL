@extends('template')
@section('title')
    Tag
@endsection
@section('header')
    <h4>Tag</h4>
@endsection
@section('main')
    <table border='1'>
        <thead>
            <th>No</th>
            <th>Tag</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
        </thead>
        <tbody>

            @if (!empty($TagBuku))
                @php
                    $i = 1
                @endphp
                @foreach($TagBuku as $key => $Tag)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $Tag->tag }}</td>
                        <td><a href="{{url('/tag.' . $Tag->id_tag . '.edit')}}">

                                <input type="button" value="Edit" />
                            </a></td>
                        <td>
                            <form action="{{url('/tag.' . $Tag->id_tag)}}" method="Post"
                                onsubmit="return confirm('Apakah data ingin dihapus?')">

                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
            @else
                <p>Tidak ada data Tag</p>
            @endif
        <tbody>
    </table>
    <p>Jumlah Data : {{ $JumlahTagBuku }}</p>
    <a href="{{url('tag.create')}}">Tambah Tag</a>
@endsection