@extends('template')
@section('title')
    Penerbit
@endsection
@section('header')
    <h4>Penerbit</h4>
@endsection
@section('main')
    <table border='1'>
        <thead>
            <th>No</th>
            <th>Penerbit</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
        </thead>
        <tbody>
            @if (!empty($PenerbitBuku))
                @php
                    $i = 1
                @endphp
                @foreach($PenerbitBuku as $key => $Penerbit)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $Penerbit->penerbit }}</td>
                        <td>{{ $Penerbit->alamat }}</td>
                        <td>{{ $Penerbit->telepon->telepon ?? '-' }}</td>
                        <td><a href="{{ url('/penerbit/' . $Penerbit->id_penerbit . '/edit') }}">
                                <input type="button" value="Edit" /></a></td>

                        <td>
                            <form action="{{ url('/penerbit/' . $Penerbit->id_penerbit) }}" method="POST"
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
                <p>Tidak ada data Penerbit</p>
            @endif
        <tbody>
    </table>
    <p>Jumlah Data : {{ $JumlahPenerbitBuku }}</p>
    <a href="{{url('/penerbit.create')}}">Tambah Penerbit</a>
@endsection