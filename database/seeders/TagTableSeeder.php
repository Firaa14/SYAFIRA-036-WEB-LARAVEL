<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Tag1 = new Tag;
        $Tag1->tag = "PHP";
        $Tag1->save();
        $Tag2 = new Tag;
        $Tag2->tag = "MySQL";
        $Tag2->save();
        $Tag3 = new Tag;
        $Tag3->tag = "Android";
        $Tag3->save();
    }
}