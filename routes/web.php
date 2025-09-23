<?php

use Illuminate\Support\Facades\Route;

Route::get('/hai', function () {
    $prodi = ['DKV', 'TI', 'Administrasi Bisnis'];
    return view('selamat.hai', ['namaprodi' => $prodi]);
});
