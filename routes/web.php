<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaiController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


Route::get('/hai', [HaiController::class, 'index']);

// Route untuk Kategori Buku
Route::get('/kategori-buku', [KategoriBukuController::class, 'index']);
Route::get('/kategori-buku/tambah', [KategoriBukuController::class, 'create']);
Route::post('/kategori-buku/data', [KategoriBukuController::class, 'store']);
Route::get('/kategori-buku/{id}/edit', [KategoriBukuController::class, 'edit']);
Route::put('/kategori-buku/{id}', [KategoriBukuController::class, 'update']);
Route::delete('/kategori-buku/{id}', [KategoriBukuController::class, 'destroy']);

// Route untuk Buku - SUDAH BENAR
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

// Route untuk Penerbit - SUDAH BENAR
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/create', [PenerbitController::class, 'create']);
Route::post('/penerbit', [PenerbitController::class, 'store']);
Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy']);

// Route untuk Tag
Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/create', [TagController::class, 'create']);
Route::post('/tag', [TagController::class, 'store']);
Route::get('/tag/{id}/edit', [TagController::class, 'edit']);
Route::put('/tag/{id}', [TagController::class, 'update']);
Route::delete('/tag/{id}', [TagController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user.create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user.cari', [UserController::class, 'search']);
Route::get('/user.{id}.edit', [UserController::class, 'edit']);
Route::put('/user.{id}', [UserController::class, 'update']);
Route::get('/user.{id}', [UserController::class, 'show']);
Route::delete('/user.{id}', [UserController::class, 'destroy']);

Route::get('login', [AuthController::class, 'showLoginForm'])->
    name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->
    name('logout');
Route::middleware('auth')->get('/profil', [
    AuthController::class,
    'showProfil'
])->name('profil');


Route::fallback(function () {
    return "Halaman Tidak Ditemukan";
});