<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penerbit;

class PenerbitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerbit::create([
            'penerbit' => 'Graha Ilmu',
            'alamat' => "Candi Gebang Permai Blok R-6\nYogyakarta"
        ]);
        Penerbit::create([
            'penerbit' => 'Andi',
            'alamat' => 'JL Beo 38-40 Yogyakarta'
        ]);
        Penerbit::create([
            'penerbit' => 'Lokomedia',
            'alamat' => "JL. Jambon, Perum. Persona Alam Hijau\nKav 2. B-4, Kricak Yogyakarta"
        ]);

    }
}
