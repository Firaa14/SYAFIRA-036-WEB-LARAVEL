@extends('template')
@section('title')
    Buku
@endsection
@section('header')
    <h4>Daftar Buku</h4>
@endsection
@section('main')
    <table border='1'>
        <thead>
            <th>No</th>
            <th>Kategori Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
        </thead>
        <tbody>
            @if (!empty($DataBuku) && count($DataBuku) > 0)
                @php $i = 1; @endphp
                @foreach($DataBuku as $Buku)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $Buku->kategori->kategori_buku ?? '-' }}</td>
                        <td>{{ $Buku->judul }}</td>
                        <td>{{ $Buku->pengarang }}</td>
                        <td>{{ $Buku->tahun_terbit }}</td>
                        <td><a href="{{ url('/buku/' . $Buku->id_buku . '/edit') }}">
                                <input type="button" value="Edit" /></a></td>
                        <td>
                            <form action="{{ url('/buku/' . $Buku->id_buku) }}" method="POST"
                                onsubmit="return confirm('Apakah data ingin dihapus?')">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                    @php $i++; @endphp
                @endforeach
            @else
                <tr>
                    <td colspan="7">Tidak ada data Buku</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ url('/buku.create') }}">Tambah Buku</a>
@endsection