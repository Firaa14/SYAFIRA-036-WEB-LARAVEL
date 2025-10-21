<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_penerbit = Penerbit::with('telepon')->get();
        $jumlah_data = $data_penerbit->count();
        return view('penerbit.tampil', [
            'PenerbitBuku' => $data_penerbit,
            'JumlahPenerbitBuku' => $jumlah_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penerbit = Penerbit::create($request->only(['penerbit', 'alamat']));
        if ($request->filled('telepon')) {
            $penerbit->telepon()->create(['telepon' => $request->telepon]);
        }
        return redirect('/penerbit');
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
        $data_penerbit = Penerbit::find($id);
        return view('penerbit.edit', [
            'PenerbitBuku' =>
                $data_penerbit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->update($request->only(['penerbit', 'alamat']));
        $telepon = $penerbit->telepon;
        if ($telepon) {
            $telepon->telepon = $request->no_telp;
            $telepon->save();
        } else if ($request->filled('no_telp')) {
            $penerbit->telepon()->create(['telepon' => $request->no_telp]);
        }
        return redirect('/penerbit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('penerbit')->where('id_penerbit', $id)->delete();
        return redirect('/penerbit');
    }
}
