<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul', 'pengarang', 'tahun_terbit', 'id_kategori_buku'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'id_kategori_buku');
    }
}
