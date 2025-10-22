<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Tag;

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
        $data_tag = Tag::orderBy('tag', 'asc')->get();
        return view('buku.tambah', [
            'DataKategori' => $data_kategori,
            'DataTag' => $data_tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->id_kategori_buku = $request->id_kategori_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
        $buku->tag()->attach($request->input("list_buku"));
        return redirect('/buku');
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
        $data_tag = Tag::orderBy('tag', 'asc')->get();
        $tag_buku = $data_buku->tag->pluck('id_tag')->toArray();
        return view('buku.edit', [
            'DataBuku' => $data_buku,
            'DataKategori' => $data_kategori,
            'DataTag' => $data_tag,
            'TagBuku' => $tag_buku
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
        $buku->tag()->sync($request->input("list_buku"));
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
