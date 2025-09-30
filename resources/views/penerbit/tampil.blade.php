@extends('template')

@section('title')
    Penerbit
@endsection

@section('header')
    <h4>Penerbit</h4>
@endsection

@section('main')
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Penerbit</th>
                <th>Alamat</th>
                <th>Aksi Edit</th>
                <th>Aksi Hapus</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($PenerbitBuku) && count($PenerbitBuku) > 0)
                @foreach($PenerbitBuku as $key => $Penerbit)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $Penerbit->penerbit }}</td>
                        <td>{{ $Penerbit->alamat }}</td>
                        <td>
                            <a href="{{ url('/penerbit/' . $Penerbit->id_penerbit . '/edit') }}">
                                <input type="button" value="Edit" />
                            </a>
                        </td>
                        <td>
                            <form action="{{ url('/penerbit/' . $Penerbit->id_penerbit) }}" method="POST"
                                onsubmit="return confirm('Apakah data ingin dihapus?')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" align="center">Tidak ada data Penerbit</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if (!empty($JumlahPenerbitBuku))
        @foreach($JumlahPenerbitBuku as $Jumlah)
            <p>Jumlah Data {{ $Jumlah->penerbit }}: {{ $Jumlah->jumlah_penerbit }}</p>
        @endforeach
    @endif
    <a href="{{ url('/penerbit/create') }}">Tambah Penerbit</a>
@endsection

@section('footer')
    <footer>© 2024 Vokasi UB</footer>
@endsection