<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_buku = Buku::all();
        return view('buku.tampil', ['DataBuku' => $data_buku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_kategori = KategoriBuku::orderBy('kategori_buku', 'asc')
            ->get();
        return view('buku.tambah', ['DataKategori' => $data_kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'judul' => $request->input('judul'),
            'pengarang' => $request->input('pengarang'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'id_kategori_buku' => $request->input('id_kategori_buku'),
        ];
        \Log::info(json_encode($data));
        Buku::create($data);
        return redirect('/kategori-buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_buku = Buku::find($id);
        $data_kategori =
            KategoriBuku::orderBy('kategori_buku', 'asc')->get();
        return view('buku.edit', [
            'DataBuku' => $data_buku,
            'DataKategori' => $data_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::find($id);
        $buku->id_kategori_buku = $request->id_kategori_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}
