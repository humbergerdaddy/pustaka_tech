<?php

use App\Models\kategori;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(kategori::class);
            $table->string('judul')->nullable();
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('isbn')->nullable();
            $table->string('tahun')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('book_img')->nullable();

            // $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            // $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
                $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');



            $table->timestamps();
            

            
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
