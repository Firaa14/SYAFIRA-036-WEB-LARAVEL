<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $fillable = ['penerbit', 'alamat'];
    public function telepon()
    {
        return $this->hasOne("App\Models\Telepon", "id_penerbit");
    }
}
