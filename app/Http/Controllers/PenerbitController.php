<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_penerbit = DB::table('penerbit')->select('*')
            ->orderBy('penerbit', 'ASC')->get();
        $jumlah_data = DB::table('penerbit')->select(
            'penerbit',
            DB::raw('COUNT(penerbit) as jumlah_penerbit')
        )
            ->groupBy('penerbit')->get();
        return view('penerbit.tampil', [
            'PenerbitBuku' =>
                $data_penerbit,
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
        $dataPenerbit = array(
            'penerbit' => $request->penerbit,
            'alamat' => $request->alamat
        );
        DB::table('penerbit')->insert($dataPenerbit);
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
        $penerbit = DB::table('penerbit')->where('id_penerbit', $id)->first();
        return view('penerbit.edit', ['PenerbitBuku' => $penerbit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPenerbit = [
            'penerbit' => $request->penerbit,
            'alamat' => $request->alamat
        ];
        DB::table('penerbit')->where('id_penerbit', $id)->update($dataPenerbit);
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
