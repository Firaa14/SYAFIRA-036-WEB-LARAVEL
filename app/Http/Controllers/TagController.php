<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tag = Tag::all();
        $jumlah_data = $data_tag->count("id_tag");
        return view('tag.tampil', [
            'TagBuku' => $data_tag,
            'JumlahTagBuku' => $jumlah_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::create(
            ['tag' => $request->tag]
        );
        return redirect('/tag');
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
        $data_tag = Tag::find($id);
        return view('tag.edit', ['TagBuku' => $data_tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data_tag = Tag::find($id);
        $data_tag->tag = $request->tag;
        $data_tag->save();
        return redirect('/tag');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_tag = Tag::find($id);
        $data_tag->delete();
        return redirect('/tag');
    }
}