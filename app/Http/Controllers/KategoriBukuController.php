<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_buku = \App\Models\Buku::with('kategori')->get();
        return view('kategori-buku.tampil', [
            'DataBuku' => $data_buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori-buku.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = KategoriBuku::create($request->all());
        return redirect('/kategori-buku');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_kategori_buku = KategoriBuku::find($id);
        return view('kategori-buku.edit', [
            'KategoriBuku' =>
                $data_kategori_buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        KategoriBuku::where('id_kategori_buku', $id)->update(['kategori_buku' => $request->kategori_buku]);
        return redirect('/kategori-buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data_kategori_buku = KategoriBuku::find($id);
        $data_kategori_buku->delete();
        return redirect('/kategori-buku');
    }
}