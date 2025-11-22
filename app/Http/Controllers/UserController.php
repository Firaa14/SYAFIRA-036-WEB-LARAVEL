<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batas = 2;
        $data_user = User::orderBy('name')->paginate($batas);
        $no = ($batas * ($data_user->currentpage() - 1)) + 1;
        return view(
            'user.tampil',
            ['DataUser' => $data_user, 'no' => $no]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $foto = $request->foto;
        $namafile = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $namafile);
        $user->foto = $namafile;
        $user->save();
        return redirect('/user')->with('status', 'Data user
berhasil dutambahkan');
    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_user = User::where('name', 'like', "%" . $cari . "%")
            ->orderBy('name')->paginate($batas);
        $jumlah_data = $data_user->count("id");
        $no = ($batas * ($data_user->currentpage() - 1)) + 1;
        return view('user.cari', [
            'DataUser' =>
                $data_user,
            'JumlahDataUser' => $jumlah_data,
            'no' => $no,
            'cari' => $cari
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_user = User::find($id);
        return view('user.detail', [
            'DataUser' =>
                $data_user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_user = User::find($id);
        return view('user.edit', ['DataUser' => $data_user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
        ])->validated();
        $data_user = User::find($id);
        if ($request->hasFile('foto')) {
            $namafileold = $data_user->foto;
            if (File::exists(public_path('foto/' . $namafileold))) {
                File::delete(public_path('foto/' . $namafileold));
            }
            if ($request->input('password')) {
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->password = bcrypt($request->password);
                $data_user->level = $request->level;
                $foto = $request->foto;
                $namafile = time() . '.' .

                    $foto->getClientOriginalExtension();
                $foto->move(public_path('foto'), $namafile);
                $data_user->foto = $namafile;
            } else {
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->level = $request->level;
                $foto = $request->foto;
                $namafile = time() . '.' .

                    $foto->getClientOriginalExtension();
                $foto->move(public_path('foto'), $namafile);
                $data_user->foto = $namafile;
            }
        } else {
            if ($request->input('password')) {
                $data_user->name = $request->nama;
                $data_user->email = $request->email;

                $data_user->password = bcrypt($request->password);
                $data_user->level = $request->level;
            } else {
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->level = $request->level;
            }
        }
        $data_user->update();
        return redirect('/user')->with(
            'status',
            'Data user berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_user = User::find($id);
        $namafile = $data_user->foto;
        if (File::exists('foto/' . $namafile)) {
            File::delete('foto/' . $namafile);
        }
        $data_user->delete();
        return redirect('/user')->with(
            'status',
            'Data user berhasil dihapus'
        );
        ;
    }
}