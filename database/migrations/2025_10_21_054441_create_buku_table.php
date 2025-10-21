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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id_buku');
            $table->String('judul', 255);
            $table->String('pengarang', 255);
            $table->integer('tahun_terbit');
            //membuat FK dari id_kategori_buku
            $table->unsignedBigInteger('id_kategori_buku');
            $table->timestamps();
            //foreign artinya kolom tersebut adalah FK
//referensi artinya kita merefensi PK pada

            //tabel kategori_buku
//melalui fungsi on

            $table->foreign('id_kategori_buku')
                ->references('id_kategori_buku')

                ->on('kategori_buku')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
