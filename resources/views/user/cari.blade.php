@extends('template')
@section('title')
    User
@endsection
@section('header')
    <h4>User</h4>
@endsection
@section('main')
    @if (session('status'))
        {{ session('status') }}
    @endif
    <form method="get" action="{{url('/user.cari')}}">
        @csrf
        <input type="text" name="katakunci">
        <input type="submit" value="Cari">
    </form><br>
    @if($JumlahDataUser > 0)
        Ditemukan {{ $JumlahDataUser }} data dengan kata kunci : {{ $cari
        }}
        <table border='1'>
            <thead>

                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aksi Edit</th>
                <th>Aksi Detail</th>
                <th>Aksi Hapus</th>
            </thead>
            <tbody>

                @if (!empty($DataUser))
                    @foreach($DataUser as $key => $User)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email }}</td>
                            <td>{{ $User->level }}</td>
                            <td><a href="{{url('/user.' . $User->

                                id . '.edit')}}">

                                    <input type="button" value="Edit" /></a></td>
                            <td><a href="{{url('/user.' . $User->

                                id . '.detail')}}">

                                    <input type="button" value="Detail" /></a></td>
                            <td>
                                <form action="{{url('/user.' . $User->id)}}" method="Post"
                                    onsubmit="return confirm('Apakah data ingin dihapus?')">

                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">

                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        @php
                            $no++
                        @endphp
                    @endforeach
                @else
                    <p>Tidak ada data User</p>
                @endif
            <tbody>
        </table>
    @else
        Data dengan kata kunci : {{ $cari }} Tidak ditemukan,
        <a href="{{url('/user')}}">Klik Disini Untuk kembali"</a>
    @endif

    {{ $DataUser->links() }}
    <a href="{{url('/user.create')}}">Tambah User</a>
@endsection