<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'telepon';
    protected $primaryKey = 'id_telepon';

    protected $fillable = ['id_penerbit', 'telepon'];
}
