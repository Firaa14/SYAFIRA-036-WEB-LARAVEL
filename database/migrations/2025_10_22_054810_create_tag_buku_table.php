<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_buku', function (Blueprint $table) {
            $table->bigIncrements('id_tag_buku');
            //membuat FK dari id_buku dan id_tag
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_tag');
            $table->timestamps();
            //tag_buku ke buku
            $table->foreign('id_buku')->references('id_buku')->on('buku')
                ->onDelete('cascade')->onUpdate('cascade');
            //tag_buku ke tag

            $table->foreign('id_tag')->references('id_tag')->on('tag')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_buku');
    }


    public function tag()
    {
        return $this->belongsToMany
        ("App\Models\Tag", "tag_buku", "id_buku", "id_tag");
    }


    public function buku()
    {
        return $this->belongsToMany
        ("App\Models\Tag", "tag_buku", "id_tag", "id_buku");
    }
};


