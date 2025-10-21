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
        Schema::create('telepon', function (Blueprint $table) {
            $table->bigIncrements('id_telepon');
            $table->String('telepon', 30)->unique();
            //membuat FK dari id_penerbit
            $table->unsignedBigInteger('id_penerbit')->unique();
            $table->timestamps();
            //foreign artinya kolom tersebut adalah FK
//referensce artinya kita merefensi PK pada tabel penerbit
//melalui fungsi on
            $table->foreign('id_penerbit')->references('id_penerbit')

                ->on('penerbit')

                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telepon');
    }
};
