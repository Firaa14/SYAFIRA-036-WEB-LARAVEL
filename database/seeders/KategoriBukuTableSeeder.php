<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBuku;

class KategoriBukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriBuku1 = new KategoriBuku;
        $kategoriBuku1->kategori_buku = "Web";
        $kategoriBuku1->save();
        $kategoriBuku2 = new KategoriBuku;
        $kategoriBuku2->kategori_buku = "Mobile";
        $kategoriBuku2->save();
        $kategoriBuku3 = new KategoriBuku;
        $kategoriBuku3->kategori_buku = "Desain";
        $kategoriBuku3->save();
    }
}